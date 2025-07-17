@extends('layouts.booking')

@section('title', 'Client Information - Book Your Spa Experience')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .input:focus, .textarea:focus, .select:focus {
            border-color: #1f2937;
            box-shadow: 0 0 0 3px rgba(31, 41, 55, 0.1);
        }
        .radio:checked {
            background-color: #1f2937;
            border-color: #1f2937;
        }
        .summary-sticky {
            position: sticky;
            bottom: 0;
        }
        @media (max-width: 1023px) {
            body {
                padding-bottom: 100px;
            }
        }
    </style>
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Breadcrumb -->
                <nav class="mb-6" aria-label="Breadcrumb">
                    <ol class="flex flex-wrap items-center space-x-2 text-sm text-gray-500">
                        <li>
                            <a href="{{ route('booking.branches') }}" class="hover:text-gray-700 transition-colors">Branch</a>
                        </li>
                        <li>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                        <li>
                            <a href="{{ route('booking.services') }}" class="hover:text-gray-700 transition-colors">Service</a>
                        </li>
                        <li>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                        <li>
                            <a href="{{ route('booking.staff') }}" class="hover:text-gray-700 transition-colors">Staff</a>
                        </li>
                        <li>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                        <li>
                            <a href="{{ route('booking.datetime') }}" class="hover:text-gray-700 transition-colors">Date & Time</a>
                        </li>
                        <li>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                        <li class="text-gray-900 font-medium">Client Info</li>
                    </ol>
                </nav>

                <div class="text-center">
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-2">Your Contact Information</h1>
                    <p class="text-gray-600 text-base sm:text-lg">Provide your details to complete your booking</p>
                </div>

                <!-- Progress Indicator -->
                <div class="mt-8 flex justify-center">
                    <div class="flex items-center space-x-2 sm:space-x-4">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Branch</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-green-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Service</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-green-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Staff</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-green-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Date & Time</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-900 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs font-medium">5</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-900 font-medium">Client Info</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Client Information Form Section -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center mb-6 sm:mb-8">
                <form action="{{ route('booking.go-back') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to Date & Time
                    </button>
                </form>
            </div>

            <!-- Main Form -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100">
                <form action="{{ route('booking.save-client-info') }}" method="POST" class="p-4 sm:p-6" id="client-info-form">
                    @csrf

                    <!-- Required Fields Section -->
                    <div class="mb-6 sm:mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Personal Information
                            <span class="text-red-500 text-sm ml-1">*</span>
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <!-- First Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    First Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="first_name" 
                                       value="{{ old('first_name', $bookingData['client_info']['first_name'] ?? '') }}"
                                       placeholder="Enter your first name"
                                       class="block w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 @error('first_name') border-red-500 @enderror"
                                       required>
                                @error('first_name')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Last Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="last_name" 
                                       value="{{ old('last_name', $bookingData['client_info']['last_name'] ?? '') }}"
                                       placeholder="Enter your last name"
                                       class="block w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 @error('last_name') border-red-500 @enderror"
                                       required>
                                @error('last_name')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input type="email" 
                                       name="email" 
                                       value="{{ old('email', $bookingData['client_info']['email'] ?? '') }}"
                                       placeholder="your.email@example.com"
                                       class="block w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 @error('email') border-red-500 @enderror"
                                       required>
                                @error('email')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" 
                                       name="phone" 
                                       value="{{ old('phone', $bookingData['client_info']['phone'] ?? '') }}"
                                       placeholder="+254701234567 or 0701234567"
                                       class="block w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 @error('phone') border-red-500 @enderror"
                                       required>
                                <p class="mt-1 text-xs text-gray-500">Format: +254XXXXXXXX or 07XXXXXXXX</p>
                                @error('phone')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Allergies -->
                        <div class="mt-4 sm:mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Allergies & Medical Notes <span class="text-red-500">*</span>
                            </label>
                            <textarea name="allergies" 
                                      placeholder="List any allergies, medical conditions, or special considerations. Write 'None' if not applicable."
                                      class="block w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 h-24 @error('allergies') border-red-500 @enderror"
                                      required>{{ old('allergies', $bookingData['client_info']['allergies'] ?? '') }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">This helps us provide the safest and best treatment for you</p>
                            @error('allergies')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Optional Information Section -->
                    <div class="mb-6 sm:mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Additional Information
                            <span class="text-sm text-gray-500 ml-2 font-normal">(Optional)</span>
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Date of Birth -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                                <input type="date" 
                                       name="date_of_birth" 
                                       value="{{ old('date_of_birth', $bookingData['client_info']['date_of_birth'] ?? '') }}"
                                       max="{{ date('Y-m-d') }}"
                                       class="block w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 @error('date_of_birth') border-red-500 @enderror">
                                @error('date_of_birth')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Gender -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                <select name="gender" class="block w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 @error('gender') border-red-500 @enderror">
                                    <option value="">Select gender (optional)</option>
                                    <option value="male" {{ old('gender', $bookingData['client_info']['gender'] ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $bookingData['client_info']['gender'] ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $bookingData['client_info']['gender'] ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                                    <option value="prefer_not_to_say" {{ old('gender', $bookingData['client_info']['gender'] ?? '') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                                </select>
                                @error('gender')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Account Creation Section -->
                    <div class="mb-6 sm:mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Account Options
                            <span class="text-sm text-gray-500 ml-2 font-normal">(Optional)</span>
                        </h3>

                        <div class="bg-gray-50 rounded-md p-4 sm:p-6 border border-gray-200">
                            <p class="text-gray-700 text-sm mb-4">Create an account to manage your bookings and preferences.</p>
                            <ul class="text-sm text-gray-600 mb-4 space-y-2">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    View and manage your bookings
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Save your preferences and information
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Faster booking for future visits
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Receive booking reminders and updates
                                </li>
                            </ul>

                            <div class="space-y-3">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="create_account" value="accepted" 
                                           class="w-4 h-4 text-gray-900 focus:ring-gray-500 border-gray-300 rounded"
                                           {{ old('create_account', $bookingData['client_info']['create_account'] ?? '') == 'accepted' ? 'checked' : '' }}>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Yes, create an account for me</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="create_account" value="no_creation" 
                                           class="w-4 h-4 text-gray-900 focus:ring-gray-500 border-gray-300 rounded"
                                           {{ old('create_account', $bookingData['client_info']['create_account'] ?? 'no_creation') == 'no_creation' ? 'checked' : '' }}>
                                    <span class="ml-3 text-sm font-medium text-gray-700">No, just book this appointment</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gray-900 text-white text-sm sm:text-base font-medium rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                            <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Continue to Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Booking Summary Sidebar -->
        <div id="booking-summary" class="bg-white border-t border-gray-100 p-4 sm:p-6 lg:p-8">
            <div class="max-w-7xl mx-auto text-center">
                <div class="text-sm text-gray-600 mb-2">Your Booking Summary:</div>
                <div class="text-base sm:text-lg font-medium text-gray-900">
                    {{ $service->name }} • KES {{ number_format($service->price, 0) }}
                </div>
                <div class="text-sm text-gray-600">
                    @if(isset($bookingData['date']) && isset($bookingData['time']))
                        {{ \Carbon\Carbon::parse($bookingData['date'])->format('M j, Y') }} at {{ \Carbon\Carbon::parse($bookingData['time'])->format('g:i A') }}
                        •
                    @endif
                    {{ $branch->name }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Phone number formatting
            const phoneInput = document.querySelector('input[name="phone"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    
                    // Auto-format for Kenyan numbers
                    if (value.startsWith('254')) {
                        e.target.value = '+' + value;
                    } else if (value.startsWith('0') && value.length >= 10) {
                        e.target.value = '+254' + value.substring(1);
                    } else if (value.length === 9 && !value.startsWith('0')) {
                        e.target.value = '+254' + value;
                    }
                });
            }

            // Form validation feedback
            const form = document.getElementById('client-info-form');
            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('[required]');
                let allValid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        allValid = false;
                        field.classList.add('border-red-500');
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });

                if (!allValid) {
                    e.preventDefault();
                    // Scroll to first error
                    const firstError = form.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                }
            });

            // Real-time validation for required fields
            const requiredInputs = document.querySelectorAll('[required]');
            requiredInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim()) {
                        this.classList.remove('border-red-500');
                    } else {
                        this.classList.add('border-red-500');
                    }
                });
            });
        });
    </script>
@endsection