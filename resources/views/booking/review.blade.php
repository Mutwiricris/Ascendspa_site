@extends('layouts.booking')

@section('title', 'Book Appointment - Review & Confirm')

@section('content')
<div class="container mx-auto px-4 max-w-4xl">
    <!-- Progress Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Book Your Appointment</h2>
            <div class="text-sm text-gray-600">
                Step 6 of 6
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
            <div class="bg-gradient-to-r from-spa-primary to-spa-secondary h-2 rounded-full transition-all duration-500 ease-out" 
                 style="width: 100%"></div>
        </div>

        <!-- Step Indicators -->
        <div class="flex items-center justify-between text-xs">
            @foreach(['Location', 'Service', 'Date', 'Time', 'Details', 'Confirm'] as $index => $stepName)
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-spa-primary text-white">
                        <span class="text-xs font-semibold">{{ $index + 1 }}</span>
                    </div>
                    <span class="text-xs text-spa-primary font-semibold">{{ $stepName }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="booking-container rounded-3xl shadow-spa-xl p-8 mb-8">
        <div class="animate-fade-in">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Review Your Booking</h3>
            
            <div class="max-w-2xl mx-auto">
                <!-- Appointment Details -->
                <div class="card-spa rounded-2xl p-8 mb-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-6">Appointment Details</h4>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between py-3 border-b border-gray-100">
                            <span class="text-gray-600">Location</span>
                            <span class="font-semibold">{{ $branch->name }}</span>
                        </div>
                        <div class="flex justify-between py-3 border-b border-gray-100">
                            <span class="text-gray-600">Service</span>
                            <span class="font-semibold">{{ $service->name }}</span>
                        </div>
                        <div class="flex justify-between py-3 border-b border-gray-100">
                            <span class="text-gray-600">Date</span>
                            <span class="font-semibold">
                                {{ \Carbon\Carbon::parse($data['date'])->format('l, F j, Y') }}
                            </span>
                        </div>
                        <div class="flex justify-between py-3 border-b border-gray-100">
                            <span class="text-gray-600">Time</span>
                            <span class="font-semibold">{{ \Carbon\Carbon::createFromFormat('H:i', $data['time'])->format('g:i A') }}</span>
                        </div>
                        @if($staff)
                            <div class="flex justify-between py-3 border-b border-gray-100">
                                <span class="text-gray-600">Specialist</span>
                                <span class="font-semibold">{{ $staff->name }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between py-3 border-b border-gray-100">
                            <span class="text-gray-600">Duration</span>
                            <span class="font-semibold">{{ $service->duration_minutes }} minutes</span>
                        </div>
                        <div class="flex justify-between items-center pt-4">
                            <span class="text-xl font-bold text-gray-900">Total</span>
                            <span class="text-2xl font-bold text-spa-primary">
                                KSh {{ number_format($service->price) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Client Information -->
                <div class="card-spa rounded-2xl p-8 mb-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-6">Your Information</h4>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Name</span>
                            <span class="font-semibold">{{ $data['first_name'] }} {{ $data['last_name'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Email</span>
                            <span class="font-semibold">{{ $data['email'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Phone</span>
                            <span class="font-semibold">{{ $data['phone'] }}</span>
                        </div>
                        @if(!empty($data['notes']))
                            <div class="pt-3 border-t border-gray-100">
                                <span class="text-gray-600 block mb-1">Special Requests</span>
                                <span class="text-sm">{{ $data['notes'] }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Payment Method Selection -->
                <div class="card-spa rounded-2xl p-8 mb-6">
                    <h4 class="text-lg font-bold text-gray-900 mb-6">Payment Method</h4>
                    
                    <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                        @csrf
                        
                        <!-- Hidden fields to preserve all booking data -->
                        @foreach($data as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        <div class="space-y-4">
                            <!-- Pay on Site -->
                            <label class="card-spa rounded-xl p-6 cursor-pointer flex items-center justify-between border-2 border-transparent hover:border-spa-primary/20 transition-all duration-200">
                                <div class="flex items-center">
                                    <input type="radio" 
                                           name="payment_method" 
                                           value="cash" 
                                           class="radio radio-primary mr-4"
                                           checked>
                                    <div>
                                        <h5 class="font-bold text-gray-900">Pay on Site</h5>
                                        <p class="text-gray-600 text-sm">Cash or card payment at the spa</p>
                                    </div>
                                </div>
                                <div class="text-2xl">💳</div>
                            </label>

                            <!-- M-Pesa -->
                            <label class="card-spa rounded-xl p-6 cursor-pointer flex items-center justify-between border-2 border-transparent hover:border-spa-primary/20 transition-all duration-200">
                                <div class="flex items-center">
                                    <input type="radio" 
                                           name="payment_method" 
                                           value="mpesa" 
                                           class="radio radio-primary mr-4">
                                    <div>
                                        <h5 class="font-bold text-gray-900">M-Pesa</h5>
                                        <p class="text-gray-600 text-sm">Pay securely with your mobile money</p>
                                    </div>
                                </div>
                                <div class="text-2xl">📱</div>
                            </label>
                        </div>

                        <!-- Terms and Actions -->
                        <div class="mt-8 text-center space-y-4">
                            <p class="text-xs text-gray-500">
                                By confirming this booking, you agree to our terms of service and cancellation policy.
                                You can cancel or modify your booking up to 24 hours before your appointment.
                            </p>
                            
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('booking.step5', $data) }}" class="btn btn-outline btn-lg px-8">
                                    Make Changes
                                </a>
                                <button type="submit" class="btn btn-spa-primary btn-lg px-8" id="confirmBtn">
                                    Confirm Booking
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enhanced payment method selection
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove selected styling from all labels
            document.querySelectorAll('label:has(input[name="payment_method"])').forEach(label => {
                label.classList.remove('border-spa-primary', 'bg-spa-accent/10');
            });
            
            // Add selected styling to current label
            const label = this.closest('label');
            label.classList.add('border-spa-primary', 'bg-spa-accent/10');
        });
    });

    // Set initial selection styling
    const selectedRadio = document.querySelector('input[name="payment_method"]:checked');
    if (selectedRadio) {
        const label = selectedRadio.closest('label');
        label.classList.add('border-spa-primary', 'bg-spa-accent/10');
    }

    // Form submission with loading state
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('confirmBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <span class="loading loading-spinner loading-sm mr-2"></span>
            Creating Booking...
        `;
    });

    // Scroll to top on page load
    window.scrollTo(0, 0);

    // Add floating action for mobile
    if (window.innerWidth <= 768) {
        const actionArea = document.querySelector('.space-y-4:last-child');
        actionArea.classList.add('fixed', 'bottom-0', 'left-0', 'right-0', 'bg-white', 'p-4', 'shadow-lg', 'border-t');
        document.body.style.paddingBottom = '120px';
    }
</script>
@endpush