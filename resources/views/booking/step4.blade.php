@extends('layouts.booking')

@section('title', 'Book Appointment - Choose Time')

@section('content')
<div class="container mx-auto px-4 max-w-4xl">
    <!-- Progress Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Book Your Appointment</h2>
            <div class="text-sm text-gray-600">
                Step 4 of 6
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
            <div class="bg-gradient-to-r from-spa-primary to-spa-secondary h-2 rounded-full transition-all duration-500 ease-out" 
                 style="width: 66.67%"></div>
        </div>

        <!-- Step Indicators -->
        <div class="flex items-center justify-between text-xs">
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-spa-primary text-white">
                    <span class="text-xs font-semibold">1</span>
                </div>
                <span class="text-xs text-spa-primary font-semibold">Location</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-spa-primary text-white">
                    <span class="text-xs font-semibold">2</span>
                </div>
                <span class="text-xs text-spa-primary font-semibold">Service</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-spa-primary text-white">
                    <span class="text-xs font-semibold">3</span>
                </div>
                <span class="text-xs text-spa-primary font-semibold">Date</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-spa-primary text-white">
                    <span class="text-xs font-semibold">4</span>
                </div>
                <span class="text-xs text-spa-primary font-semibold">Time</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-gray-200 text-gray-600">
                    <span class="text-xs font-semibold">5</span>
                </div>
                <span class="text-xs text-gray-500">Details</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-gray-200 text-gray-600">
                    <span class="text-xs font-semibold">6</span>
                </div>
                <span class="text-xs text-gray-500">Confirm</span>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="booking-container rounded-3xl shadow-spa-xl p-8 mb-8">
        <div class="animate-fade-in">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Select Time</h3>
                    <p class="text-gray-600">Choose your preferred appointment time.</p>
                </div>
                <a href="{{ route('booking.step3', ['branch_id' => $branch->id, 'service_id' => $service->id]) }}" class="btn btn-outline btn-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
            </div>

            <!-- Booking Summary -->
            <div class="mb-6 p-4 bg-spa-accent/20 rounded-xl">
                <p class="text-sm text-gray-700 mb-1">
                    <span class="font-semibold">Location:</span> {{ $branch->name }}
                </p>
                <p class="text-sm text-gray-700 mb-1">
                    <span class="font-semibold">Service:</span> {{ $service->name }}
                </p>
                <p class="text-sm text-gray-700">
                    <span class="font-semibold">Date:</span> 
                    {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}
                </p>
            </div>

            <!-- Time Slots -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                @forelse($timeSlots as $slot)
                    <form action="{{ route('booking.step5') }}" method="GET" class="block">
                        <input type="hidden" name="branch_id" value="{{ $branch->id }}">
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="date" value="{{ $date }}">
                        <input type="hidden" name="time" value="{{ $slot['time'] }}">
                        @if(isset($slot['staff_id']))
                            <input type="hidden" name="staff_id" value="{{ $slot['staff_id'] }}">
                        @endif
                        
                        <button type="submit" 
                                class="time-slot rounded-xl p-4 text-center transition-all duration-200 hover:shadow-md w-full
                                       {{ $slot['available'] ? 'bg-white border border-gray-200 hover:border-spa-primary hover:bg-spa-accent/10' : 'bg-gray-100 border border-gray-100 opacity-50 cursor-not-allowed' }}"
                                {{ $slot['available'] ? '' : 'disabled' }}>
                            <div class="font-semibold text-sm {{ $slot['available'] ? 'text-gray-900' : 'text-gray-400' }}">
                                {{ $slot['formatted_time'] ?? $slot['time'] }}
                            </div>
                            @if(isset($slot['staff_name']) && $slot['available'])
                                <div class="text-xs text-gray-500 mt-1">{{ $slot['staff_name'] }}</div>
                            @endif
                        </button>
                    </form>
                @empty
                    <div class="col-span-full text-center py-8">
                        <div class="text-gray-500 mb-4">
                            <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600 mb-4">No available time slots for this date.</p>
                        <a href="{{ route('booking.step3', ['branch_id' => $branch->id, 'service_id' => $service->id]) }}" class="btn btn-spa-primary btn-sm">
                            Choose Different Date
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Time Selection Tips -->
            <div class="mt-8 p-4 bg-blue-50 rounded-xl">
                <h4 class="font-semibold text-blue-900 mb-2">💡 Booking Tips</h4>
                <ul class="text-sm text-blue-800 space-y-1">
                    <li>• Morning appointments (9-11 AM) are usually less crowded</li>
                    <li>• Afternoon slots (2-4 PM) offer a relaxing midday break</li>
                    <li>• Weekend appointments fill up quickly - book in advance</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enhanced time slot selection with animations
    document.querySelectorAll('.time-slot:not([disabled])').forEach(slot => {
        slot.addEventListener('mouseenter', function() {
            this.classList.add('transform', 'scale-105', 'shadow-lg');
        });
        
        slot.addEventListener('mouseleave', function() {
            this.classList.remove('transform', 'scale-105', 'shadow-lg');
        });

        // Add loading state on selection
        slot.closest('form').addEventListener('submit', function() {
            slot.disabled = true;
            slot.innerHTML = `
                <div class="loading loading-spinner loading-sm"></div>
                <div class="text-xs mt-1">Loading...</div>
            `;
        });
    });

    // Add pulse animation to available slots
    setTimeout(() => {
        document.querySelectorAll('.time-slot:not([disabled])').forEach((slot, index) => {
            setTimeout(() => {
                slot.classList.add('animate-pulse');
                setTimeout(() => {
                    slot.classList.remove('animate-pulse');
                }, 1000);
            }, index * 100);
        });
    }, 500);
</script>
@endpush