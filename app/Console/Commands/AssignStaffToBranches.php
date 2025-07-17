<?php

namespace App\Console\Commands;

use App\Models\Staff;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AssignStaffToBranches extends Command
{
    protected $signature = 'staff:assign-to-branches {--reset : Reset all existing assignments}';
    protected $description = 'Assign staff members to specific branches (branch-specific staff)';

    public function handle()
    {
        $reset = $this->option('reset');

        if ($reset) {
            $this->info('Resetting all staff-branch assignments...');
            DB::table('branch_staff')->delete();
            DB::table('staff_services')->delete();
            DB::table('staff_schedules')->delete();
        }

        $branches = Branch::active()->get();
        $services = Service::active()->get();
        $allStaff = Staff::active()->get();

        if ($branches->isEmpty()) {
            $this->error('No active branches found.');
            return 1;
        }

        if ($allStaff->isEmpty()) {
            $this->error('No active staff found.');
            return 1;
        }

        $this->info('Assigning staff to branches...');

        // Define staff specializations and branch assignments
        $branchStaffAssignments = [
            'Ascend Spa - Westlands' => [
                'Sarah Johnson' => ['Hair Cut & Style', 'Deep Tissue Massage', 'Classic Facial'],
                'Michael Chen' => ['Swedish Massage', 'Hot Stone Massage', 'Anti-Aging Facial'],
            ],
            'Ascend Spa - Karen' => [
                'Grace Wanjiku' => ['Hair Cut & Style', 'Hydrating Facial', 'Manicure'],
                'David Kimani' => ['Deep Tissue Massage', 'Swedish Massage', 'Hot Stone Massage'],
            ],
            'Ascend Spa - CBD' => [
                'Lisa Mwangi' => ['Swedish Massage', 'Classic Facial', 'Pedicure'],
                'James Ochieng' => ['Hair Cut & Style', 'Hot Stone Massage', 'Men\'s Haircut'],
            ]
        ];

        $totalAssignments = 0;
        $serviceAssignments = 0;

        foreach ($branchStaffAssignments as $branchName => $staffAssignments) {
            $branch = $branches->firstWhere('name', $branchName);
            
            if (!$branch) {
                $this->warn("Branch '{$branchName}' not found, skipping...");
                continue;
            }

            $this->info("Processing branch: {$branchName}");

            foreach ($staffAssignments as $staffName => $serviceNames) {
                $staff = $allStaff->firstWhere('name', $staffName);
                
                if (!$staff) {
                    $this->warn("  Staff '{$staffName}' not found, skipping...");
                    continue;
                }

                // Assign staff to branch
                $branch->staff()->syncWithoutDetaching([
                    $staff->id => [
                        'is_primary_branch' => true,
                        'working_hours' => json_encode([
                            'monday' => ['09:00', '18:00'],
                            'tuesday' => ['09:00', '18:00'],
                            'wednesday' => ['09:00', '18:00'],
                            'thursday' => ['09:00', '18:00'],
                            'friday' => ['09:00', '19:00'],
                            'saturday' => ['10:00', '17:00'],
                            'sunday' => ['11:00', '16:00'],
                        ]),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                ]);

                $totalAssignments++;
                $this->info("  ✓ Assigned {$staffName} to {$branchName}");

                // Assign services to staff
                foreach ($serviceNames as $serviceName) {
                    $service = $services->firstWhere('name', $serviceName);
                    
                    if ($service) {
                        $staff->services()->syncWithoutDetaching([
                            $service->id => [
                                'proficiency_level' => 'expert',
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]
                        ]);
                        $serviceAssignments++;
                        $this->info("    ✓ Can perform: {$serviceName}");
                    } else {
                        $this->warn("    Service '{$serviceName}' not found");
                    }
                }
            }
            
            $this->info("");
        }

        // Show summary
        $this->info("✅ Assignment completed!");
        $this->table(
            ['Metric', 'Count'],
            [
                ['Branches Processed', $branches->count()],
                ['Staff-Branch Assignments', $totalAssignments],
                ['Staff-Service Assignments', $serviceAssignments],
            ]
        );

        // Show final state
        $this->info("\n📊 FINAL BRANCH-STAFF DISTRIBUTION:");
        foreach ($branches as $branch) {
            $branchStaff = $branch->staff()->get();
            $this->info("🏢 {$branch->name}: {$branchStaff->count()} staff members");
            foreach ($branchStaff as $staff) {
                $services = $staff->services()->pluck('name')->join(', ');
                $this->info("   👤 {$staff->name} - Services: {$services}");
            }
        }

        return 0;
    }
}