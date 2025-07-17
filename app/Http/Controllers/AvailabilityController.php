<?php

namespace App\Http\Controllers;

use App\Services\AvailabilityService;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    protected AvailabilityService $availabilityService;

    public function __construct(AvailabilityService $availabilityService)
    {
        $this->availabilityService = $availabilityService;
    }

    /**
     * Get available dates for a service
     */
    public function getDates(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'days_ahead' => 'nullable|integer|min:1|max:90',
        ]);

        $dates = $this->availabilityService->getAvailableDates(
            $request->service_id,
            $request->branch_id,
            $request->days_ahead ?? 30
        );

        return response()->json($dates);
    }

    /**
     * Get available time slots for a specific date
     */
    public function getTimeSlots(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'staff_id' => 'nullable|exists:staff,id',
        ]);

        $timeSlots = $this->availabilityService->getAvailableTimeSlots(
            $request->date,
            $request->service_id,
            $request->branch_id,
            $request->staff_id
        );

        return response()->json($timeSlots);
    }

    /**
     * Get available staff for a service
     */
    public function getStaff(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'date' => 'required|date|after_or_equal:today',
        ]);

        $staff = $this->availabilityService->getAvailableStaffForService(
            $request->service_id,
            $request->branch_id,
            $request->date
        );

        return response()->json($staff);
    }

    /**
     * Check if a specific time slot is available
     */
    public function checkTimeSlot(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'service_id' => 'required|exists:services,id',
            'branch_id' => 'required|exists:branches,id',
            'staff_id' => 'nullable|exists:staff,id',
        ]);

        $available = $this->availabilityService->isSpecificTimeSlotAvailable(
            $request->date,
            $request->time,
            $request->service_id,
            $request->branch_id,
            $request->staff_id
        );

        return response()->json([
            'available' => $available,
            'message' => $available ? 'Time slot is available' : 'Time slot is not available'
        ]);
    }
}
