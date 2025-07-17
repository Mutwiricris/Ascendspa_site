<?php

namespace App\Console\Commands;

use App\Models\Staff;
use App\Models\Branch;
use App\Models\StaffSchedule;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PopulateStaffSchedules extends Command
{
    protected $signature = 'staff:populate-schedules {--days=30 : Number of days ahead to populate} {--force : Force recreate existing schedules}';
    protected $description = 'Populate staff schedules for the next X days';

    public function handle()
    {
        $days = $this->option('days');
        $force = $this->option('force');

        $this->info("Populating staff schedules for the next {$days} days...");

        $staff = Staff::active()->with('branches')->get();
        $branches = Branch::active()->get();

        if ($staff->isEmpty()) {
            $this->error('No active staff found.');
            return 1;
        }

        if ($branches->isEmpty()) {
            $this->error('No active branches found.');
            return 1;
        }

        $startDate = Carbon::now()->startOfDay();
        $endDate = $startDate->copy()->addDays((int) $days);

        $totalSchedules = 0;
        $skippedSchedules = 0;

        // Standard working hours for different days
        $workingHours = [
            'monday' => ['09:00', '18:00'],
            'tuesday' => ['09:00', '18:00'],
            'wednesday' => ['09:00', '18:00'],
            'thursday' => ['09:00', '18:00'],
            'friday' => ['09:00', '19:00'],
            'saturday' => ['10:00', '17:00'],
            'sunday' => ['11:00', '16:00'], // Some staff work Sundays
        ];

        foreach ($staff as $staffMember) {
            $this->info("Processing schedules for {$staffMember->name}...");

            // Get staff's specific branches only (no fallback to all branches)
            $staffBranches = $staffMember->branches;

            foreach ($staffBranches as $branch) {
                for ($date = $startDate->copy(); $date <= $endDate; $date->addDay()) {
                    $dayOfWeek = strtolower($date->format('l'));
                    
                    // Check if schedule already exists
                    $existingSchedule = StaffSchedule::where('staff_id', $staffMember->id)
                        ->where('branch_id', $branch->id)
                        ->where('date', $date->toDateString())
                        ->first();

                    if ($existingSchedule && !$force) {
                        $skippedSchedules++;
                        continue;
                    }

                    // Delete existing if force mode
                    if ($existingSchedule && $force) {
                        $existingSchedule->delete();
                    }

                    // Some staff don't work Sundays (70% chance to work)
                    $worksToday = $dayOfWeek !== 'sunday' || rand(1, 100) <= 70;

                    if (!$worksToday) {
                        continue;
                    }

                    $hours = $workingHours[$dayOfWeek];
                    $startTime = $hours[0];
                    $endTime = $hours[1];

                    // Add some variation to start/end times (±30 minutes)
                    $startVariation = rand(-30, 30);
                    $endVariation = rand(-30, 30);

                    $actualStartTime = Carbon::createFromFormat('H:i', $startTime)->addMinutes($startVariation);
                    $actualEndTime = Carbon::createFromFormat('H:i', $endTime)->addMinutes($endVariation);

                    // Ensure minimum 6-hour shift
                    if ($actualEndTime->diffInHours($actualStartTime) < 6) {
                        $actualEndTime = $actualStartTime->copy()->addHours(6);
                    }

                    // Add lunch break for longer shifts (if shift > 6 hours)
                    $breakStart = null;
                    $breakEnd = null;
                    if ($actualEndTime->diffInHours($actualStartTime) > 6) {
                        $breakStart = $actualStartTime->copy()->addHours(3)->addMinutes(rand(-30, 30));
                        $breakEnd = $breakStart->copy()->addMinutes(rand(30, 60));
                    }

                    StaffSchedule::create([
                        'staff_id' => $staffMember->id,
                        'branch_id' => $branch->id,
                        'date' => $date->toDateString(),
                        'start_time' => $actualStartTime->format('H:i'),
                        'end_time' => $actualEndTime->format('H:i'),
                        'break_start' => $breakStart ? $breakStart->format('H:i') : null,
                        'break_end' => $breakEnd ? $breakEnd->format('H:i') : null,
                        'is_available' => true,
                        'notes' => 'Auto-generated schedule'
                    ]);

                    $totalSchedules++;
                }
            }
        }

        $this->info("✅ Successfully created {$totalSchedules} schedules.");
        
        if ($skippedSchedules > 0) {
            $this->info("⏭️ Skipped {$skippedSchedules} existing schedules (use --force to recreate).");
        }

        // Show summary
        $this->table(
            ['Metric', 'Count'],
            [
                ['Active Staff', $staff->count()],
                ['Active Branches', $branches->count()],
                ['Schedules Created', $totalSchedules],
                ['Schedules Skipped', $skippedSchedules],
                ['Date Range', $startDate->format('Y-m-d') . ' to ' . $endDate->format('Y-m-d')],
            ]
        );

        return 0;
    }
}