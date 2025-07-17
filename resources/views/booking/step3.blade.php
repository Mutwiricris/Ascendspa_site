@extends('layouts.booking')

@section('title', 'Book Appointment - Choose Date')

@section('content')
<div class="container mx-auto px-4 max-w-4xl">
    <!-- Progress Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Book Your Appointment</h2>
            <div class="text-sm text-gray-600">
                Step 3 of 6
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
            <div class="bg-gradient-to-r from-spa-primary to-spa-secondary h-2 rounded-full transition-all duration-500 ease-out" 
                 style="width: 50%"></div>
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
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-gray-200 text-gray-600">
                    <span class="text-xs font-semibold">4</span>
                </div>
                <span class="text-xs text-gray-500">Time</span>
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
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Select Date</h3>
                    <p class="text-gray-600">When would you like your appointment?</p>
                </div>
                <a href="{{ route('booking.step2', ['branch_id' => $branch->id]) }}" class="btn btn-outline btn-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
            </div>

            <!-- Selected Service -->
            <div class="mb-6 p-4 bg-spa-accent/20 rounded-xl">
                <p class="text-sm text-gray-700 mb-1">
                    <span class="font-semibold">Selected Location:</span> {{ $branch->name }}
                </p>
                <p class="text-sm text-gray-700 mb-1">
                    <span class="font-semibold">Selected Service:</span> {{ $service->name }}
                </p>
                <p class="text-sm text-gray-700">
                    <span class="font-semibold">Duration:</span> {{ $service->duration_minutes }} minutes | 
                    <span class="font-semibold">Price:</span> KSh {{ number_format($service->price) }}
                </p>
            </div>

            <!-- Available Dates -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @forelse($availableDates as $dateOption)
                    <form action="{{ route('booking.step4') }}" method="GET" class="block">
                        <input type="hidden" name="branch_id" value="{{ $branch->id }}">
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="date" value="{{ $dateOption['date'] }}">
                        <button type="submit" class="card-spa rounded-xl p-4 cursor-pointer transform transition-all duration-300 hover:scale-105 text-center w-full">
                            <div class="text-lg font-bold text-gray-900 mb-1">
                                {{ \Carbon\Carbon::parse($dateOption['date'])->format('M j') }}
                            </div>
                            <div class="text-sm text-gray-600 mb-2">
                                {{ $dateOption['day_name'] }}
                            </div>
                            <div class="text-xs text-spa-primary font-semibold">
                                {{ $dateOption['available_slots'] }} slots available
                            </div>
                            @if($dateOption['is_today'])
                                <span class="inline-block mt-2 px-2 py-1 bg-spa-primary text-white text-xs rounded-full">
                                    Today
                                </span>
                            @endif
                        </button>
                    </form>
                @empty
                    <div class="col-span-full text-center py-8">
                        <div class="text-gray-500 mb-4">
                            <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600 mb-4">No available dates found for this service.</p>
                        <a href="{{ route('booking.step2', ['branch_id' => $branch->id]) }}" class="btn btn-spa-primary btn-sm">
                            Choose Different Service
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enhanced date selection with visual feedback
    document.querySelectorAll('.card-spa').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('shadow-lg', 'border-spa-primary/20');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('shadow-lg', 'border-spa-primary/20');
        });
    });

    // Add loading state on selection
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const button = this.querySelector('button');
            button.disabled = true;
            button.innerHTML = '<div class="loading loading-spinner loading-sm"></div>';
        });
    });
</script>
@endpush