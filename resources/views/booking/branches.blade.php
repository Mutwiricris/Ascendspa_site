@extends('layouts.booking')

@section('title', 'Select Branch - Book Your Spa Experience')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="text-center">
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-2">Choose Your Spa Location</h1>
                    <p class="text-base sm:text-lg text-gray-600">Select the branch for your wellness experience</p>
                </div>

                <!-- Progress Indicator -->
                <div class="mt-6 sm:mt-8 flex justify-center">
                    <div class="flex items-center space-x-2 sm:space-x-4">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-900 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs font-medium">1</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-900 font-medium">Branch</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-500 text-xs font-medium">2</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Service</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-500 text-xs font-medium">3</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Staff</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-500 text-xs font-medium">4</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Date & Time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Branch Selection Section -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            @if($branches->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($branches as $branch)
                        <form action="{{ route('booking.select-branch') }}" method="POST" class="branch-form">
                            @csrf
                            <input type="hidden" name="branch_id" value="{{ $branch->id }}">

                            <div class="card bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer group @if(isset($bookingData['branch_id']) && $bookingData['branch_id'] == $branch->id) border-gray-900 bg-gray-50 @endif"
                                onclick="this.closest('form').submit()">
                                <div class="p-4 sm:p-6">
                                    <!-- Branch Image/Icon -->
                                    <div class="flex items-center justify-center mb-4">
                                        <img src="{{ $branch->image_url }}" alt="{{ $branch->name }}"
                                            class="w-12 h-12 sm:w-16 sm:h-16 rounded-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    </div>

                                    <!-- Branch Details -->
                                    <div class="text-center">
                                        <h3
                                            class="text-base sm:text-lg font-medium text-gray-900 mb-2 group-hover:text-gray-700 transition-colors">
                                            {{ $branch->name }}
                                        </h3>

                                        <div class="space-y-2 text-sm text-gray-600">
                                            <div class="flex items-center justify-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span>{{ $branch->address }}</span>
                                            </div>

                                            @if($branch->phone)
                                                <div class="flex items-center justify-center">
                                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                        </path>
                                                    </svg>
                                                    <span>{{ $branch->phone }}</span>
                                                </div>
                                            @endif

                                            <!-- Working Hours -->
                                            @if($branch->working_hours)
                                                @php
                                                    $hours = is_string($branch->working_hours) ? json_decode($branch->working_hours, true) : $branch->working_hours;
                                                    $today = strtolower(date('l', strtotime('2025-07-12')));
                                                    $todayHours = $hours[$today] ?? null;
                                                @endphp

                                                @if($todayHours && isset($todayHours['open']) && isset($todayHours['close']))
                                                    <div class="flex items-center justify-center">
                                                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span>Today: {{ $todayHours['open'] }} - {{ $todayHours['close'] }}</span>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>

                                        <!-- Status Badge -->
                                        <div class="mt-4">
                                            <div
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                                <div class="w-2 h-2 bg-green-300 rounded-full animate-pulse mr-1.5"></div>
                                                Open
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Select Button -->
                                    <div class="mt-4 sm:mt-6">
                                        <button type="submit"
                                            class="w-full flex items-center justify-center px-4 py-2 sm:py-3 text-sm font-medium text-white bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors group-hover:scale-105">
                                            <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Select This Location
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            @else
                <!-- No Branches Available -->
                <div class="text-center py-12 sm:py-16">
                    <div class="max-w-md mx-auto">
                        <div
                            class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                            <svg class="w-8 sm:w-10 h-8 sm:h-10 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-900 mb-2">No Branches Available</h3>
                        <p class="text-gray-600 mb-4 sm:mb-6">We're currently setting up our spa locations. Please check back
                            soon!</p>
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                            Return Home
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <style>
        .branch-form .card {
            transition: all 0.3s ease;
        }

        .branch-form:hover .card {
            transform: translateY(-2px);
        }
    </style>

    <script>
        // Enhanced branch selection with loading states and error handling
        document.querySelectorAll('.branch-form').forEach(form => {
            const card = form.querySelector('.card');
            const button = form.querySelector('button[type="submit"]');
            
            if (card && button) {
                card.addEventListener('click', function () {
                    // Add visual feedback
                    this.classList.add('scale-95');
                    button.innerHTML = `
                        <svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Selecting...
                    `;
                    button.disabled = true;
                    
                    setTimeout(() => {
                        this.classList.remove('scale-95');
                    }, 150);
                });

                // Handle form submission errors
                form.addEventListener('submit', function(e) {
                    try {
                        // Form will submit normally
                    } catch (error) {
                        e.preventDefault();
                        console.error('Form submission error:', error);
                        if (window.BookingUtils) {
                            window.BookingUtils.showNotification('Unable to select branch. Please try again.', 'error');
                        }
                        
                        // Reset button state
                        button.innerHTML = `
                            <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Select This Location
                        `;
                        button.disabled = false;
                    }
                });
            }
        });

        // Handle network errors
        window.addEventListener('online', function() {
            if (window.BookingUtils) {
                window.BookingUtils.showNotification('Connection restored. You can continue booking.', 'success');
            }
        });

        window.addEventListener('offline', function() {
            if (window.BookingUtils) {
                window.BookingUtils.showNotification('No internet connection. Please check your network.', 'error');
            }
        });
    </script>
@endsection