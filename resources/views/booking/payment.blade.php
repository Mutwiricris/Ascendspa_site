@extends('layouts.booking')

@section('title', 'Payment Method - Book Your Spa Experience')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .payment-card {
            transition: all 0.3s ease;
        }
        .payment-card.selected {
            border-color: #1f2937;
            background-color: #f3f4f6;
        }
        .payment-card.selected .radio-indicator {
            border-color: #1f2937;
            background-color: #1f2937;
        }
        .payment-card:hover {
            transform: translateY(-2px);
        }
        .radio-indicator {
            transition: all 0.2s ease;
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
                        <li>
                            <a href="{{ route('booking.client-info') }}" class="hover:text-gray-700 transition-colors">Client Info</a>
                        </li>
                        <li>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                        <li class="text-gray-900 font-medium">Payment</li>
                    </ol>
                </nav>

                <div class="text-center">
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-2">Choose Payment Method</h1>
                    <p class="text-gray-600 text-base sm:text-lg">Select how you'd like to pay for your spa experience</p>
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
                        <div class="w-4 sm:w-6 h-px bg-green-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Client Info</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-900 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs font-medium">6</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-900 font-medium">Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Payment Selection Section -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center mb-6 sm:mb-8">
                <form action="{{ route('booking.go-back') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to Client Info
                    </button>
                </form>
            </div>

            <!-- Booking Summary -->
            <div id="booking-summary" class="@if(isset($bookingData['date']) && isset($bookingData['time'])) summary-sticky @endif bg-white rounded-lg border border-gray-100 p-4 sm:p-6 mb-6 sm:mb-8 shadow-sm">
                <h2 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Booking Summary
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 text-sm">
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Service:</span>
                            <span class="text-gray-900 font-medium">{{ $service->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Duration:</span>
                            <span class="text-gray-900">{{ $service->duration_minutes }} minutes</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Branch:</span>
                            <span class="text-gray-900">{{ $branch->name }}</span>
                        </div>
                        @if($staff)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Therapist:</span>
                                <span class="text-gray-900">{{ $staff->name }}</span>
                            </div>
                        @else
                            <div class="flex justify-between">
                                <span class="text-gray-600">Therapist:</span>
                                <span class="text-gray-900">Auto-assigned</span>
                            </div>
                        @endif
                    </div>
                    <div class="space-y-2">
                        @if(isset($bookingData['date']) && isset($bookingData['time']))
                            <div class="flex justify-between">
                                <span class="text-gray-600">Date:</span>
                                <span class="text-gray-900">{{ \Carbon\Carbon::parse($bookingData['date'])->format('M j, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Time:</span>
                                <span class="text-gray-900">{{ \Carbon\Carbon::parse($bookingData['time'])->format('g:i A') }}</span>
                            </div>
                        @endif
                        @if(isset($bookingData['client_info']))
                            <div class="flex justify-between">
                                <span class="text-gray-600">Client:</span>
                                <span class="text-gray-900">{{ $bookingData['client_info']['first_name'] }} {{ $bookingData['client_info']['last_name'] }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between text-base font-semibold border-t pt-2 border-gray-100">
                            <span class="text-gray-700">Total Amount:</span>
                            <span class="text-gray-900">KES {{ number_format($service->price, 0) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <form action="{{ route('booking.confirm') }}" method="POST" id="payment-form">
                @csrf
                <div class="bg-white rounded-lg border border-gray-100 shadow-sm">
                    <div class="p-4 sm:p-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            Payment Options
                        </h2>
                        <div class="space-y-4">
                            <!-- Pay on Site (Default) -->
                            <label class="payment-option cursor-pointer">
                                <input type="radio" name="payment_method" value="cash" class="hidden" checked>
                                <div class="payment-card selected border-2 border-gray-900 bg-gray-50 rounded-md p-4 sm:p-6 transition-all duration-300 hover:shadow-sm">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-base sm:text-lg font-medium text-gray-900">Pay on Site</h3>
                                                <p class="text-gray-600 text-sm">Pay cash or card at the spa</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="text-xs sm:text-sm text-gray-600 mr-2 sm:mr-3">Recommended</div>
                                            <div class="radio-indicator w-5 h-5 border-2 border-gray-900 rounded-full bg-gray-900 flex items-center justify-center">
                                                <div class="w-2.5 h-2.5 bg-white rounded-full"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 sm:mt-4 text-sm text-gray-600">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            No advance payment required
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Pay with cash or card at the spa
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Easy cancellation if needed
                                        </div>
                                    </div>
                                </div>
                            </label>

                            <!-- M-Pesa -->
                            <label class="payment-option cursor-pointer">
                                <input type="radio" name="payment_method" value="mpesa" class="hidden">
                                <div class="payment-card border-2 border-gray-200 rounded-md p-4 sm:p-6 transition-all duration-300 hover:shadow-sm hover:border-gray-300">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                                <span class="text-white font-semibold text-base">M</span>
                                            </div>
                                            <div>
                                                <h3 class="text-base sm:text-lg font-medium text-gray-900">M-Pesa</h3>
                                                <p class="text-gray-600 text-sm">Pay via mobile money</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="text-xs sm:text-sm text-gray-600 mr-2 sm:mr-3">STK Push</div>
                                            <div class="radio-indicator w-5 h-5 border-2 border-gray-200 rounded-full flex items-center justify-center">
                                                <div class="w-2.5 h-2.5 bg-transparent rounded-full"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 sm:mt-4 text-sm text-gray-600">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Secure mobile payment
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Instant payment confirmation
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            No need to carry cash
                                        </div>
                                    </div>
                                    <div class="mt-3 sm:mt-4 p-2 sm:p-3 bg-gray-50 rounded-md border border-gray-200">
                                        <p class="text-sm text-gray-600">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            You'll receive an STK push notification to complete payment
                                        </p>
                                    </div>
                                </div>
                            </label>

                            <!-- Credit/Debit Card -->
                            <label class="payment-option cursor-pointer">
                                <input type="radio" name="payment_method" value="card" class="hidden">
                                <div class="payment-card border-2 border-gray-200 rounded-md p-4 sm:p-6 transition-all duration-300 hover:shadow-sm hover:border-gray-300">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-base sm:text-lg font-medium text-gray-900">Credit/Debit Card</h3>
                                                <p class="text-gray-600 text-sm">Pay with Visa or Mastercard</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="text-xs sm:text-sm text-gray-600 mr-2 sm:mr-3">Secure</div>
                                            <div class="radio-indicator w-5 h-5 border-2 border-gray-200 rounded-full flex items-center justify-center">
                                                <div class="w-2.5 h-2.5 bg-transparent rounded-full"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 sm:mt-4 text-sm text-gray-600">
                                        <div class="flex items-center mb-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            SSL encrypted payment
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Instant confirmation
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            International cards accepted
                                        </div>
                                    </div>
                                    <div class="mt-3 sm:mt-4 p-2 sm:p-3 bg-gray-50 rounded-md border border-gray-200">
                                        <p class="text-sm text-gray-600">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Card payment processing will be handled securely
                                        </p>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- Error Messages -->
                        @if($errors->any())
                            <div class="mt-4 sm:mt-6 p-3 sm:p-4 bg-red-50 border border-red-200 rounded-md">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-red-800 font-medium">Please fix the following errors:</span>
                                </div>
                                <ul class="text-red-700 text-sm space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01"></path>
                                            </svg>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="mt-6 sm:mt-8 text-center">
                            <button type="submit" class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gray-900 text-white text-sm sm:text-base font-medium rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                                <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Complete Booking
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentOptions = document.querySelectorAll('.payment-option');
            const paymentCards = document.querySelectorAll('.payment-card');
            const radioButtons = document.querySelectorAll('input[name="payment_method"]');

            paymentOptions.forEach((option) => {
                option.addEventListener('click', function() {
                    // Clear all selections
                    paymentCards.forEach(card => {
                        card.classList.remove('selected', 'border-gray-900', 'bg-gray-50');
                        card.classList.add('border-gray-200');
                    });

                    radioButtons.forEach(radio => {
                        radio.checked = false;
                    });

                    // Update radio indicators
                    document.querySelectorAll('.radio-indicator').forEach(indicator => {
                        indicator.classList.remove('border-gray-900', 'bg-gray-900');
                        indicator.classList.add('border-gray-200');
                        indicator.querySelector('div').classList.add('bg-transparent');
                        indicator.querySelector('div').classList.remove('bg-white');
                    });

                    // Select current option
                    const card = this.querySelector('.payment-card');
                    const radio = this.querySelector('input[name="payment_method"]');
                    const indicator = this.querySelector('.radio-indicator');

                    card.classList.add('selected', 'border-gray-900', 'bg-gray-50');
                    card.classList.remove('border-gray-200');
                    
                    radio.checked = true;

                    indicator.classList.add('border-gray-900', 'bg-gray-900');
                    indicator.classList.remove('border-gray-200');
                    indicator.querySelector('div').classList.remove('bg-transparent');
                    indicator.querySelector('div').classList.add('bg-white');
                });
            });

            // Form submission with loading state
            const form = document.getElementById('payment-form');
            form.addEventListener('submit', function() {
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Processing Booking...
                `;
            });
        });
    </script>
@endsection