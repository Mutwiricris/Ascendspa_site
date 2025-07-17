<?php

namespace App\Livewire\Booking;

use App\Models\Booking;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingWizard extends Component
{
    // Booking Flow State
    public $currentStep = 1;
    public $selectedBranch = null;
    public $selectedService = null;
    public $selectedDate = null;
    public $selectedStaff = null;
    public $selectedTimeSlot = null;
    public $paymentMethod = 'cash';
    public $bookingReference = null;
    
    // Client Information
    public $clientInfo = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'allergies' => '',
        'create_account_status' => 'no_creation',
        'marketing_consent' => false,
        'notes' => ''
    ];
    
    // Static data - no database calls during component lifecycle
    public $branches = [];
    public $services = [];
    public $availableDates = [];
    public $timeSlots = [];
    
    // UI State
    public $loading = false;

    protected $rules = [
        'clientInfo.first_name' => 'required|min:2|max:50',
        'clientInfo.last_name' => 'required|min:2|max:50',
        'clientInfo.email' => 'required|email|max:100',
        'clientInfo.phone' => 'required',
        'clientInfo.allergies' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->initializeStaticData();
    }

    private function initializeStaticData()
    {
        // Static branches data
        $this->branches = [
            ['id' => 1, 'name' => 'Ascend Spa - Westlands', 'address' => 'Westlands Shopping Centre, Ring Road, Nairobi', 'phone' => '+254700123456'],
            ['id' => 2, 'name' => 'Ascend Spa - Karen', 'address' => 'Karen Shopping Centre, Karen Road, Nairobi', 'phone' => '+254700123457'],
            ['id' => 3, 'name' => 'Ascend Spa - CBD', 'address' => 'Kencom House, Moi Avenue, Nairobi CBD', 'phone' => '+254700123458'],
        ];

        // Static services data organized by category
        $this->services = [
            'Hair Services' => [
                ['id' => 1, 'name' => 'Hair Cut & Style', 'price' => 2500, 'duration' => 60, 'description' => 'Professional haircut with styling'],
                ['id' => 2, 'name' => 'Hair Coloring', 'price' => 4500, 'duration' => 120, 'description' => 'Professional hair coloring service'],
                ['id' => 3, 'name' => 'Hair Treatment', 'price' => 3000, 'duration' => 90, 'description' => 'Deep conditioning and treatment'],
            ],
            'Spa & Massage' => [
                ['id' => 4, 'name' => 'Swedish Massage', 'price' => 3500, 'duration' => 60, 'description' => 'Relaxing full body massage'],
                ['id' => 5, 'name' => 'Deep Tissue Massage', 'price' => 4000, 'duration' => 75, 'description' => 'Therapeutic deep tissue massage'],
                ['id' => 6, 'name' => 'Hot Stone Massage', 'price' => 5000, 'duration' => 90, 'description' => 'Luxurious hot stone therapy'],
            ],
            'Facial Treatments' => [
                ['id' => 7, 'name' => 'Classic Facial', 'price' => 2000, 'duration' => 45, 'description' => 'Basic cleansing and moisturizing facial'],
                ['id' => 8, 'name' => 'Anti-Aging Facial', 'price' => 3500, 'duration' => 75, 'description' => 'Advanced anti-aging treatment'],
                ['id' => 9, 'name' => 'Hydrating Facial', 'price' => 2800, 'duration' => 60, 'description' => 'Deep hydration and nourishment'],
            ],
            'Nail Care' => [
                ['id' => 10, 'name' => 'Manicure', 'price' => 1500, 'duration' => 45, 'description' => 'Professional nail care and polish'],
                ['id' => 11, 'name' => 'Pedicure', 'price' => 1800, 'duration' => 60, 'description' => 'Complete foot care and polish'],
                ['id' => 12, 'name' => 'Gel Manicure', 'price' => 2200, 'duration' => 60, 'description' => 'Long-lasting gel polish manicure'],
            ],
            'Barbershop' => [
                ['id' => 13, 'name' => "Men's Haircut", 'price' => 1800, 'duration' => 45, 'description' => 'Classic barbershop haircut'],
                ['id' => 14, 'name' => 'Beard Trim', 'price' => 1200, 'duration' => 30, 'description' => 'Professional beard trimming and styling'],
                ['id' => 15, 'name' => 'Haircut & Beard Package', 'price' => 2500, 'duration' => 75, 'description' => 'Complete grooming package'],
            ],
        ];
    }

    public function selectBranch($branchId)
    {
        $this->selectedBranch = $branchId;
        $this->nextStep();
    }

    public function selectService($serviceId)
    {
        $this->selectedService = $serviceId;
        $this->generateAvailableDates();
        $this->nextStep();
    }

    private function generateAvailableDates()
    {
        $this->availableDates = [];
        $startDate = Carbon::now();
        
        // Generate next 14 days as available dates
        for ($i = 0; $i < 14; $i++) {
            $date = $startDate->clone()->addDays($i);
            $this->availableDates[] = [
                'date' => $date->toDateString(),
                'formatted_date' => $date->format('M j'),
                'day_name' => $date->format('l'),
                'available_slots' => rand(3, 8), // Random number of slots
                'is_today' => $date->isToday(),
            ];
        }
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->generateTimeSlots();
        $this->nextStep();
    }

    private function generateTimeSlots()
    {
        $this->timeSlots = [];
        $startHour = 9; // 9 AM
        $endHour = 17; // 5 PM
        
        // Generate time slots every 30 minutes
        for ($hour = $startHour; $hour < $endHour; $hour++) {
            for ($minute = 0; $minute < 60; $minute += 30) {
                $time = sprintf('%02d:%02d', $hour, $minute);
                $timeCarbon = Carbon::createFromFormat('H:i', $time);
                
                $this->timeSlots[] = [
                    'time' => $time,
                    'formatted_time' => $timeCarbon->format('g:i A'),
                    'available' => true,
                    'staff_name' => 'Available Staff'
                ];
            }
        }
    }

    public function selectTimeSlot($timeSlot)
    {
        $this->selectedTimeSlot = $timeSlot;
        $this->nextStep();
    }

    public function nextStep()
    {
        if ($this->currentStep < 7) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submitBooking()
    {
        $this->loading = true;
        
        try {
            $this->validate();
            
            // Generate booking reference
            $this->bookingReference = 'SPA' . strtoupper(Str::random(6));
            
            // For now, just simulate booking creation
            // In production, you would create the actual booking record
            sleep(1); // Simulate processing time
            
            $this->currentStep = 7; // Confirmation step
            
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create booking. Please try again.');
        } finally {
            $this->loading = false;
        }
    }

    public function resetBooking()
    {
        return redirect()->route('booking.create');
    }

    public function getSelectedBranchProperty()
    {
        if (!$this->selectedBranch) return null;
        
        return collect($this->branches)->firstWhere('id', $this->selectedBranch);
    }

    public function getSelectedServiceProperty()
    {
        if (!$this->selectedService) return null;
        
        foreach ($this->services as $category => $services) {
            $service = collect($services)->firstWhere('id', $this->selectedService);
            if ($service) {
                return $service;
            }
        }
        return null;
    }

    public function render()
    {
        return view('livewire.booking.booking-wizard');
    }
}