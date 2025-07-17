@extends('layouts.booking')

@section('title', 'Select Staff - Book Your Spa Experience')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Breadcrumb -->
                <nav class="mb-6" aria-label="Breadcrumb">
                    <ol class="flex flex-wrap items-center space-x-2 text-sm text-gray-500">
                        <li>
                            <a href="{{ route('booking.branches') }}"
                                class="hover:text-gray-700 transition-colors">Branch</a>
                        </li>
                        <li>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </li>
                        <li>
                            <a href="{{ route('booking.services') }}"
                                class="hover:text-gray-700 transition-colors">Service</a>
                        </li>
                        <li>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </li>
                        <li class="text-gray-900 font-medium">Staff</li>
                    </ol>
                </nav>

                <div class="text-center">
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-2">Select Your Therapist</h1>
                    <p class="text-gray-600 text-base sm:text-lg">
                        Choose a professional for your <span class="font-medium">{{ $service->name }}</span> at
                        {{ $branch->name }}
                    </p>
                </div>

                <!-- Progress Indicator -->
                <div class="mt-8 flex justify-center">
                    <div class="flex items-center space-x-2 sm:space-x-4">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Branch</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-green-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Service</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-900 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs font-medium">3</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-900 font-medium">Staff</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-500 text-xs font-medium">4</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-500">Date & Time</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Staff Selection Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center mb-6 sm:mb-8">
                <form action="{{ route('booking.go-back') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Back to Services
                    </button>
                </form>
            </div>

            <!-- Auto-Assign Option -->
            <div class="mb-8 sm:mb-10">
                <form action="{{ route('booking.select-staff') }}" method="POST">
                    @csrf
                    <input type="hidden" name="staff_id" value="">
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100 p-4 sm:p-6 cursor-pointer @if(isset($bookingData['staff_id']) && empty($bookingData['staff_id'])) ring-2 ring-gray-300 @endif"
                        onclick="this.closest('form').submit()">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg sm:text-xl font-medium text-gray-900">Auto-Assign Therapist</h3>
                                    <p class="text-sm text-gray-500">We'll select the best available therapist based on
                                        expertise and availability.</p>
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors w-full sm:w-auto">
                                Continue
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Or Divider -->
            <div class="flex items-center my-6 sm:my-8">
                <div class="flex-1 border-t border-gray-200"></div>
                <span class="px-4 text-sm text-gray-500">Or choose a therapist</span>
                <div class="flex-1 border-t border-gray-200"></div>
            </div>

            @if($staff->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($staff as $member)
                        <form action="{{ route('booking.select-staff') }}" method="POST" class="staff-form">
                            @csrf
                            <input type="hidden" name="staff_id" value="{{ $member->id }}">
                            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 p-4 sm:p-6 cursor-pointer @if(isset($bookingData['staff_id']) && $bookingData['staff_id'] == $member->id) ring-2 ring-gray-300 @endif"
                                onclick="this.closest('form').submit()">
                                <div class="flex flex-col items-center text-center">
                                    <!-- Staff Photo -->
                                    <div class="mb-4">
                                        @if($member->profile_image)
                                            <div class="w-16 h-16 rounded-full overflow-hidden">
                                                <img src="{{ $member->profile_image }}" alt="{{ $member->name }}"
                                                    class="w-full h-full object-cover">
                                            </div>
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                <span class="text-gray-600 text-xl font-medium">{{ substr($member->name, 0, 1) }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Staff Details -->
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $member->name }}</h3>

                                    <!-- Experience -->
                                    @if($member->experience_years)
                                        <p class="text-sm text-gray-500 mb-2">{{ $member->experience_years }} years experience</p>
                                    @endif

                                    <!-- Proficiency Level -->
                                    @if($member->services->count() > 0)
                                                        @php
                                                            $proficiency = $member->services->first()->pivot->proficiency_level ?? 'expert';
                                                            $proficiencyColors = [
                                                                'beginner' => 'bg-blue-50 text-blue-700',
                                                                'intermediate' => 'bg-yellow-50 text-yellow-700',
                                                                'expert' => 'bg-green-50 text-green-700',
                                                                'master' => 'bg-purple-50 text-purple-700'
                                                            ];
                                                        @endphp
                                        <span
                                                            class="inline-block px-2 py-1 text-xs font-medium rounded-full {{ $proficiencyColors[$proficiency] ?? 'bg-green-50 text-green-700' }} mb-3">
                                                            {{ ucfirst($proficiency) }} Level
                                                        </span>
                                    @endif

                                    <!-- Bio -->
                                    @if($member->bio)
                                        <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $member->bio }}</p>
                                    @endif

                                    <!-- Specialties -->
                                    @if($member->specialties)
                                        @php
                                            $specialties = is_string($member->specialties) ? json_decode($member->specialties, true) : $member->specialties;
                                        @endphp
                                        @if(is_array($specialties) && count($specialties) > 0)
                                            <div class="flex flex-wrap justify-center gap-1 mb-4">
                                                @foreach(array_slice($specialties, 0, 3) as $specialty)
                                                    <span
                                                        class="inline-block px-2 py-1 text-xs text-gray-600 border border-gray-200 rounded-full">{{ $specialty }}</span>
                                                @endforeach
                                                @if(count($specialties) > 3)
                                                    <span
                                                        class="inline-block px-2 py-1 text-xs text-gray-400 border border-gray-200 rounded-full">+{{ count($specialties) - 3 }}</span>
                                                @endif
                                            </div>
                                        @endif
                                    @endif

                                    <!-- Availability Status -->
                                    <span
                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 bg-green-50 rounded-full mb-4">
                                        <span class="w-2 h-2 bg-green-400 rounded-full mr-1 animate-pulse"></span>
                                        Available Today
                                    </span>

                                    <!-- Select Button -->
                                    <button type="submit"
                                        class="w-full px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                                        Select
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            @else
                <!-- No Staff Available -->
                <div class="text-center py-12 sm:py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-medium text-gray-900 mb-2">No Staff Available</h3>
                        <p class="text-gray-600 mb-6 text-sm sm:text-base">No staff available for this service at this branch.
                            Try a different service or branch.</p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="{{ route('booking.services') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                                Different Service
                            </a>
                            <a href="{{ route('booking.branches') }}"
                                class="inline-flex items-center px-4 py-2 bg-white text-gray-700 border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                                Different Branch
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Service Summary Footer -->
        <footer class="bg-white border-t border-gray-100 sticky bottom-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-center gap-4 text-sm text-gray-600">
                    <span class="font-medium">Selected: {{ $service->name }}</span>
                    <span class="hidden sm:inline">•</span>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $service->duration_minutes }} min
                    </div>
                    <span class="hidden sm:inline">•</span>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                            </path>
                        </svg>
                        KES {{ number_format($service->price, 0) }}
                    </div>
                    <span class="hidden sm:inline">•</span>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $branch->name }}
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <style>
        .staff-form .card {
            transition: all 0.3s ease;
        }

        .staff-form:hover .card {
            transform: translateY(-2px);
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>

    <script>
        document.querySelectorAll('.staff-form .card').forEach(card => {
            card.addEventListener('click', function () {
                this.classList.add('scale-95');
                setTimeout(() => {
                    this.classList.remove('scale-95');
                }, 150);
            });
        });
    </script>
@endsection