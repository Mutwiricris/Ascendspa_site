@extends('layouts.booking')

@section('title', 'Book Appointment - Choose Service')

@section('content')
<div class="container mx-auto px-4 max-w-4xl">
    <!-- Progress Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Book Your Appointment</h2>
            <div class="text-sm text-gray-600">
                Step 2 of 6
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
            <div class="bg-gradient-to-r from-spa-primary to-spa-secondary h-2 rounded-full transition-all duration-500 ease-out" 
                 style="width: 33.33%"></div>
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
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-gray-200 text-gray-600">
                    <span class="text-xs font-semibold">3</span>
                </div>
                <span class="text-xs text-gray-500">Date</span>
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
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Choose Your Service</h3>
                    <p class="text-gray-600">What would you like to experience today?</p>
                </div>
                <a href="{{ route('booking.create') }}" class="btn btn-outline btn-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
            </div>

            <!-- Selected Location -->
            <div class="mb-6 p-4 bg-spa-accent/20 rounded-xl">
                <p class="text-sm text-gray-700">
                    <span class="font-semibold">Selected Location:</span> {{ $branch->name }}
                </p>
            </div>
            
            <!-- Services by Category -->
            <div class="space-y-8">
                @foreach($services as $categoryName => $categoryServices)
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                            <span class="text-2xl mr-3">
                                @switch($categoryName)
                                    @case('Hair Services') 💇 @break
                                    @case('Spa & Massage') 💆 @break
                                    @case('Facial Treatments') ✨ @break
                                    @case('Nail Care') 💅 @break
                                    @case('Barbershop') ✂️ @break
                                    @default 🌟
                                @endswitch
                            </span>
                            {{ $categoryName }}
                        </h4>
                        
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($categoryServices as $service)
                                <form action="{{ route('booking.step3') }}" method="GET" class="block">
                                    <input type="hidden" name="branch_id" value="{{ $branch->id }}">
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    <button type="submit" class="card-spa rounded-xl p-6 cursor-pointer transform transition-all duration-300 hover:scale-105 w-full text-left">
                                        <div class="flex justify-between items-start mb-3">
                                            <h5 class="font-bold text-gray-900">{{ $service->name }}</h5>
                                            <span class="text-lg font-bold text-spa-primary">
                                                KSh {{ number_format($service->price) }}
                                            </span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-3">{{ $service->description }}</p>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $service->duration_minutes }} minutes
                                        </div>
                                    </button>
                                </form>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enhanced hover effects for service cards
    document.querySelectorAll('.card-spa').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('shadow-xl', 'bg-gradient-to-br', 'from-white', 'to-spa-accent/10');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('shadow-xl', 'bg-gradient-to-br', 'from-white', 'to-spa-accent/10');
        });
    });
</script>
@endpush