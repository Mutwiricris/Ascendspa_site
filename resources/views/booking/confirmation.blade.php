@extends('layouts.booking')

@section('title', 'Booking Confirmed - Ascend Spa')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .animate-pulse-success {
                animation: pulse-success 1.5s ease-in-out;
            }
            @keyframes pulse-success {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.1); }
            }
        </style>
        <div class="min-h-screen bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
                <!-- Success Animation -->
                <div class="text-center mb-6 sm:mb-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full mx-auto mb-4 sm:mb-6 flex items-center justify-center animate-pulse-success">
                        <svg class="w-8 h-8 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-2">Booking Confirmed!</h1>
                    <p class="text-base sm:text-lg text-gray-600">Your appointment has been successfully booked.</p>
                </div>

                <!-- Booking Reference -->
                <div class="max-w-md mx-auto mb-6 sm:mb-8">
                    <div class="bg-white rounded-lg border border-gray-100 p-4 sm:p-6 text-center shadow-sm">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Booking Reference</h3>
                        <div class="text-xl sm:text-2xl font-semibold text-gray-900 mb-2 tracking-wide">{{ $booking->booking_reference }}</div>
                        <p class="text-sm text-gray-500">Save this reference number for your records</p>
                    </div>
                </div>

                <!-- Booking Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <!-- Appointment Information -->
                    <div class="bg-white rounded-lg border border-gray-100 p-4 sm:p-6 shadow-sm">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Appointment Details
                        </h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Service</span>
                                <span class="font-medium text-gray-900">{{ $booking->service->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Date</span>
                                <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($booking->appointment_date)->format('l, F j, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Time</span>
                                <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($booking->start_time)->format('g:i A') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-medium text-gray-900">{{ $booking->service->duration_minutes }} minutes</span>
                            </div>
                            @if($booking->staff)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Specialist</span>
                                    <span class="font-medium text-gray-900">{{ $booking->staff->name }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between pt-3 border-t border-gray-100">
                                <span class="text-gray-600">Total Amount</span>
                                <span class="font-semibold text-gray-900">KSh {{ number_format($booking->total_amount) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Location Information -->
                    <div class="bg-white rounded-lg border border-gray-100 p-4 sm:p-6 shadow-sm">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            Location Details
                        </h3>
                        <div class="space-y-3 text-sm">
                            <div>
                                <p class="font-medium text-gray-900">{{ $booking->branch->name }}</p>
                                <p class="text-gray-600">{{ $booking->branch->address }}</p>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                {{ $booking->branch->phone }}
                            </div>
                            @if($booking->branch->email)
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $booking->branch->email }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Important Information -->
                <div class="bg-white rounded-lg border border-gray-100 p-4 sm:p-6 mb-6 sm:mb-8 shadow-sm">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Important Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 text-sm">
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">What to Expect</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    A confirmation email has been sent to <strong>{{ $booking->client_email }}</strong>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    You will receive a reminder 24 hours before your appointment
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Please arrive 15 minutes early for check-in
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Bring a valid ID for verification
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Cancellation Policy</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Free cancellation up to 24 hours before appointment
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Late cancellations may incur a fee
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    No-shows will be charged the full amount
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Rescheduling is available subject to availability
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Payment Information -->
                @if($booking->payment_method === 'mpesa')
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 sm:p-6 mb-6 sm:mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            Payment Instructions
                        </h3>
                        <p class="text-gray-700 text-sm mb-4">You selected M-Pesa as your payment method. You will receive an M-Pesa prompt shortly.</p>
                        <div class="text-sm text-gray-600">
                            <p><strong>Amount:</strong> KSh {{ number_format($booking->total_amount) }}</p>
                            <p><strong>Reference:</strong> {{ $booking->booking_reference }}</p>
                        </div>
                    </div>
                @else
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 sm:p-6 mb-6 sm:mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            Payment on Site
                        </h3>
                        <p class="text-gray-700 text-sm">You chose to pay at the spa. Payment can be made by cash or card upon arrival.</p>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="text-center space-y-4">
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Back to Home
                        </a>
                        <a href="{{ route('booking.index') }}" class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Book Another Appointment
                        </a>
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-600 mb-4">Share your appointment:</p>
                        <div class="flex justify-center space-x-3 sm:space-x-4">
                            <button onclick="shareOnWhatsApp()" class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488z"/>
                                </svg>
                                WhatsApp
                            </button>
                            <button onclick="copyToClipboard()" class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Copy Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
                <script>
                    // WhatsApp sharing
                    function shareOnWhatsApp() {
                        const message = `I just booked an appointment at Ascend Spa!

            Service: {{ $booking->service->name }}
            Location: {{ $booking->branch->name }}
            Date: {{ \Carbon\Carbon::parse($booking->appointment_date)->format('l, F j, Y') }}
            Time: {{ \Carbon\Carbon::parse($booking->start_time)->format('g:i A') }}
            Reference: {{ $booking->booking_reference }}

            Can't wait for my spa experience!`;

                        const encodedMessage = encodeURIComponent(message);
                        window.open(`https://wa.me/?text=${encodedMessage}`, '_blank');
                    }

                    // Copy booking details to clipboard
                    function copyToClipboard() {
                        const bookingDetails = `Ascend Spa Booking Confirmation

            Reference: {{ $booking->booking_reference }}
            Service: {{ $booking->service->name }}
            Date: {{ \Carbon\Carbon::parse($booking->appointment_date)->format('l, F j, Y') }}
            Time: {{ \Carbon\Carbon::parse($booking->start_time)->format('g:i A') }}
            Location: {{ $booking->branch->name }}
            Address: {{ $booking->branch->address }}
            Phone: {{ $booking->branch->phone }}

            Total Amount: KSh {{ number_format($booking->total_amount) }}
            Payment Method: {{ ucfirst($booking->payment_method) }}`;

                        navigator.clipboard.writeText(bookingDetails).then(() => {
                            // Show success notification
                            const btn = event.target.closest('button');
                            const originalText = btn.innerHTML;
                            btn.innerHTML = `
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Copied!
                            `;
                            btn.classList.remove('border-gray-200', 'text-gray-700', 'hover:bg-gray-50');
                            btn.classList.add('bg-gray-900', 'text-white', 'hover:bg-gray-800');

                            setTimeout(() => {
                                btn.innerHTML = originalText;
                                btn.classList.add('border-gray-200', 'text-gray-700', 'hover:bg-gray-50');
                                btn.classList.remove('bg-gray-900', 'text-white', 'hover:bg-gray-800');
                            }, 2000);
                        });
                    }

                    // Auto scroll to top
                    window.scrollTo(0, 0);
                </script>
        @endpush
@endsection