<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\Service;
use App\Models\Staff;
use App\Models\StaffSchedule;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AvailabilityService
{
    private const DEFAULT_TIME_SLOT_INTERVAL = 30; // minutes
    private const MINIMUM_BOOKING_NOTICE = 2; // hours

    /**
     * Generate available time slots for a specific service, date, and branch
     */
    public function getAvailableTimeSlots(
        string $date,
        int $serviceId,
        int $branchId,
        ?int $staffId = null
    ): Collection {
        $service = Service::findOrFail($serviceId);
        $branch = Branch::findOrFail($branchId);
        $appointmentDate = Carbon::createFromFormat('Y-m-d', $date);

        // Check if date is in the future and within allowed booking window
        if (!$this->isDateBookable($appointmentDate, $service)) {
            return collect();
        }

        // Get available staff for this service/branch
        $availableStaff = $staffId 
            ? collect([Staff::find($staffId)]) 
            : $this->getAvailableStaffForService($serviceId, $branchId, $date);

        if ($availableStaff->isEmpty()) {
            return collect();
        }

        $allTimeSlots = collect();

        foreach ($availableStaff as $staff) {
            $staffSlots = $this->generateStaffTimeSlots($staff, $service, $appointmentDate, $branch);
            $allTimeSlots = $allTimeSlots->merge($staffSlots);
        }

        // Remove duplicates and sort by time
        return $allTimeSlots->unique('time')->sortBy('time')->values();
    }

    /**
     * Get available staff for a specific service, branch, and date
     */
    public function getAvailableStaffForService(int $serviceId, int $branchId, string $date): Collection
    {
        return Staff::active()
            ->whereHas('services', function ($query) use ($serviceId) {
                $query->where('service_id', $serviceId);
            })
            ->whereHas('branches', function ($query) use ($branchId) {
                $query->where('branch_id', $branchId);
            })
            ->whereHas('schedules', function ($query) use ($date) {
                $query->where('date', $date)
                      ->where('is_available', true);
            })
            ->with(['schedules' => function ($query) use ($date) {
                $query->where('date', $date);
            }])
            ->get();
    }

    /**
     * Generate time slots for a specific staff member
     */
    private function generateStaffTimeSlots(Staff $staff, Service $service, Carbon $date, Branch $branch): Collection
    {
        $schedule = $staff->schedules()
            ->where('date', $date->toDateString())
            ->where('branch_id', $branch->id)
            ->where('is_available', true)
            ->first();

        if (!$schedule) {
            return collect();
        }

        // Get existing bookings for this staff on this date
        $existingBookings = Booking::active()
            ->where('staff_id', $staff->id)
            ->where('appointment_date', $date->toDateString())
            ->get();

        $timeSlots = collect();
        $workingPeriods = $schedule->working_hours;

        // If working_hours is empty, create a single period from start_time to end_time
        if (empty($workingPeriods)) {
            $workingPeriods = [[
                'start' => $schedule->start_time,
                'end' => $schedule->end_time
            ]];
        }

        foreach ($workingPeriods as $period) {
            try {
                // Handle both string times and Carbon objects
                $startTime = is_string($period['start']) 
                    ? Carbon::createFromFormat('H:i', $period['start'])
                    : $period['start'];
                $endTime = is_string($period['end']) 
                    ? Carbon::createFromFormat('H:i', $period['end'])
                    : $period['end'];

                $periodSlots = $this->generateSlotsForPeriod(
                    $startTime,
                    $endTime,
                    $service,
                    $existingBookings,
                    $date,
                    $staff
                );
                $timeSlots = $timeSlots->merge($periodSlots);
            } catch (\Exception $e) {
                logger()->error('Error generating time slots for period: ' . $e->getMessage());
                continue;
            }
        }

        return $timeSlots;
    }

    /**
     * Generate time slots for a specific working period
     */
    private function generateSlotsForPeriod(
        Carbon $periodStart,
        Carbon $periodEnd,
        Service $service,
        Collection $existingBookings,
        Carbon $date,
        Staff $staff
    ): Collection {
        $timeSlots = collect();
        $serviceDuration = $service->duration_minutes;
        $bufferTime = $service->buffer_time_minutes ?? 0;
        $totalDuration = $serviceDuration + $bufferTime;

        // Start from period start, but not earlier than minimum booking notice
        $currentTime = $this->getEarliestBookableTime($date, $periodStart);
        
        while ($currentTime->clone()->addMinutes($serviceDuration) <= $periodEnd) {
            $endTime = $currentTime->clone()->addMinutes($serviceDuration);
            $bufferEndTime = $endTime->clone()->addMinutes($bufferTime);

            if ($this->isTimeSlotAvailable($currentTime, $bufferEndTime, $existingBookings)) {
                $timeSlots->push([
                    'time' => $currentTime->format('H:i'),
                    'end_time' => $endTime->format('H:i'),
                    'staff_id' => $staff->id,
                    'staff_name' => $staff->name,
                    'available' => true,
                    'formatted_time' => $currentTime->format('g:i A') . ' - ' . $endTime->format('g:i A')
                ]);
            }

            // Move to next time slot interval
            $currentTime->addMinutes(self::DEFAULT_TIME_SLOT_INTERVAL);
        }

        return $timeSlots;
    }

    /**
     * Check if a time slot is available (no conflicts with existing bookings)
     */
    private function isTimeSlotAvailable(Carbon $startTime, Carbon $endTime, Collection $existingBookings): bool
    {
        foreach ($existingBookings as $booking) {
            $bookingStart = Carbon::createFromFormat('H:i', $booking->start_time->format('H:i'));
            $bookingEnd = Carbon::createFromFormat('H:i', $booking->end_time->format('H:i'));

            // Check for any overlap
            if ($startTime < $bookingEnd && $endTime > $bookingStart) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the earliest bookable time considering minimum notice period
     */
    private function getEarliestBookableTime(Carbon $date, Carbon $periodStart): Carbon
    {
        $now = Carbon::now();
        $minimumTime = $now->addHours(self::MINIMUM_BOOKING_NOTICE);

        // If booking for today, ensure minimum notice period
        if ($date->isToday()) {
            return $minimumTime > $periodStart ? $minimumTime : $periodStart;
        }

        return $periodStart;
    }

    /**
     * Check if a date is bookable based on service constraints
     */
    private function isDateBookable(Carbon $date, Service $service): bool
    {
        $now = Carbon::now();
        $maxAdvanceDays = $service->max_advance_booking_days ?? 90;

        // Must be in the future (or today with minimum notice)
        if ($date->isPast()) {
            return false;
        }

        // Must be within maximum advance booking period
        if ($date->diffInDays($now) > $maxAdvanceDays) {
            return false;
        }

        return true;
    }

    /**
     * Get available dates for a service within the next X days
     */
    public function getAvailableDates(int $serviceId, int $branchId, int $daysAhead = 30): Collection
    {
        $service = Service::findOrFail($serviceId);
        $startDate = Carbon::now();
        $endDate = $startDate->clone()->addDays($daysAhead);
        $availableDates = collect();

        // Get the maximum advance booking days for this service
        $maxAdvanceDays = $service->max_advance_booking_days ?? 90;
        if ($daysAhead > $maxAdvanceDays) {
            $daysAhead = $maxAdvanceDays;
            $endDate = $startDate->clone()->addDays($daysAhead);
        }

        for ($date = $startDate->clone(); $date <= $endDate; $date->addDay()) {
            $timeSlots = $this->getAvailableTimeSlots(
                $date->toDateString(),
                $serviceId,
                $branchId
            );

            if ($timeSlots->isNotEmpty()) {
                $availableDates->push([
                    'date' => $date->toDateString(),
                    'formatted_date' => $date->format('l, M j, Y'),
                    'day_name' => $date->format('l'),
                    'available_slots' => $timeSlots->count(),
                    'is_today' => $date->isToday(),
                    'is_weekend' => $date->isWeekend()
                ]);
            }
        }

        return $availableDates;
    }

    /**
     * Check if a specific time slot is still available (for real-time validation)
     */
    public function isSpecificTimeSlotAvailable(
        string $date,
        string $time,
        int $serviceId,
        int $branchId,
        ?int $staffId = null
    ): bool {
        $availableSlots = $this->getAvailableTimeSlots($date, $serviceId, $branchId, $staffId);
        
        return $availableSlots->contains(function ($slot) use ($time, $staffId) {
            $timeMatches = $slot['time'] === $time;
            $staffMatches = $staffId ? $slot['staff_id'] === $staffId : true;
            
            return $timeMatches && $staffMatches;
        });
    }

    /**
     * Reserve a time slot (create a pending booking)
     */
    public function reserveTimeSlot(array $bookingData): ?Booking
    {
        // Validate availability one more time before creating booking
        if (!$this->isSpecificTimeSlotAvailable(
            $bookingData['appointment_date'],
            $bookingData['start_time'],
            $bookingData['service_id'],
            $bookingData['branch_id'],
            $bookingData['staff_id'] ?? null
        )) {
            return null;
        }

        // Calculate end time based on service duration
        $service = Service::find($bookingData['service_id']);
        $startTime = Carbon::createFromFormat('H:i', $bookingData['start_time']);
        $endTime = $startTime->clone()->addMinutes($service->duration_minutes);

        $bookingData['end_time'] = $endTime->format('H:i');
        $bookingData['total_amount'] = $service->price;
        $bookingData['status'] = 'pending';

        return Booking::create($bookingData);
    }

    /**
     * Get branch working hours for a specific date
     */
    public function getBranchWorkingHours(int $branchId, string $date): ?array
    {
        $branch = Branch::find($branchId);
        if (!$branch || !$branch->working_hours) {
            return null;
        }

        $dayOfWeek = Carbon::createFromFormat('Y-m-d', $date)->format('l');
        $dayKey = strtolower($dayOfWeek);

        return $branch->working_hours[$dayKey] ?? null;
    }
}