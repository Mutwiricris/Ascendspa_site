@extends('layouts.booking')

@section('title', 'Book Appointment - Your Information')

@section('content')
<div class="container mx-auto px-4 max-w-4xl">
    <!-- Progress Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Book Your Appointment</h2>
            <div class="text-sm text-gray-600">
                Step 5 of 6
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
            <div class="bg-gradient-to-r from-spa-primary to-spa-secondary h-2 rounded-full transition-all duration-500 ease-out" 
                 style="width: 83.33%"></div>
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
                <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 bg-spa-primary text-white">
                    <span class="text-xs font-semibold">5</span>
                </div>
                <span class="text-xs text-spa-primary font-semibold">Details</span>
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
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Your Information</h3>
                    <p class="text-gray-600">Please provide your contact details.</p>
                </div>
                <a href="{{ route('booking.step4', $data) }}" class="btn btn-outline btn-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
            </div>

            <!-- Booking Summary -->
            <div class="mb-6 p-4 bg-spa-accent/20 rounded-xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm text-gray-700">
                    <p><span class="font-semibold">Location:</span> {{ $branch->name }}</p>
                    <p><span class="font-semibold">Service:</span> {{ $service->name }}</p>
                    <p><span class="font-semibold">Date:</span> {{ \Carbon\Carbon::parse($data['date'])->format('l, M j') }}</p>
                    <p><span class="font-semibold">Time:</span> {{ \Carbon\Carbon::createFromFormat('H:i', $data['time'])->format('g:i A') }}</p>
                </div>
                @if($staff)
                    <p class="text-sm text-gray-700 mt-2">
                        <span class="font-semibold">Specialist:</span> {{ $staff->name }}
                    </p>
                @endif
            </div>

            <!-- Client Information Form -->
            <form action="{{ route('booking.review') }}" method="POST" id="clientForm" class="max-w-2xl mx-auto">
                @csrf
                
                <!-- Hidden fields to preserve booking data -->
                @foreach($data as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">First Name *</label>
                        <input type="text" 
                               name="first_name"
                               value="{{ old('first_name') }}"
                               class="input input-bordered w-full @error('first_name') input-error @enderror"
                               placeholder="Enter your first name"
                               required>
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name *</label>
                        <input type="text" 
                               name="last_name"
                               value="{{ old('last_name') }}"
                               class="input input-bordered w-full @error('last_name') input-error @enderror"
                               placeholder="Enter your last name"
                               required>
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                        <input type="email" 
                               name="email"
                               value="{{ old('email') }}"
                               class="input input-bordered w-full @error('email') input-error @enderror"
                               placeholder="your@email.com"
                               required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" 
                               name="phone"
                               value="{{ old('phone') }}"
                               class="input input-bordered w-full @error('phone') input-error @enderror"
                               placeholder="+254712345678 or 0712345678"
                               required>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth (Optional)</label>
                        <input type="date" 
                               name="date_of_birth"
                               value="{{ old('date_of_birth') }}"
                               class="input input-bordered w-full">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Gender (Optional)</label>
                        <select name="gender" class="select select-bordered w-full">
                            <option value="">Select gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            <option value="prefer_not_to_say" {{ old('gender') == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                        </select>
                    </div>
                </div>

                <!-- Allergies -->
                <div class="mt-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Allergies & Medical Notes *</label>
                    <textarea name="allergies"
                              class="textarea textarea-bordered w-full h-24 @error('allergies') textarea-error @enderror"
                              placeholder="Please list any allergies or medical conditions we should be aware of, or write 'None'"
                              required>{{ old('allergies') }}</textarea>
                    @error('allergies')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Special Notes -->
                <div class="mt-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Special Requests (Optional)</label>
                    <textarea name="notes"
                              class="textarea textarea-bordered w-full h-20"
                              placeholder="Any special requests or preferences for your appointment...">{{ old('notes') }}</textarea>
                </div>

                <!-- Account Creation -->
                <div class="mt-6 p-4 bg-spa-accent/20 rounded-xl">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Account Preferences</label>
                    <div class="space-y-2">
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" 
                                   name="create_account" 
                                   value="no" 
                                   class="radio radio-sm radio-primary mr-3"
                                   {{ old('create_account', 'no') == 'no' ? 'checked' : '' }}>
                            <span class="text-sm">Book as guest (no account needed)</span>
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" 
                                   name="create_account" 
                                   value="yes" 
                                   class="radio radio-sm radio-primary mr-3"
                                   {{ old('create_account') == 'yes' ? 'checked' : '' }}>
                            <span class="text-sm">Create account for future bookings</span>
                        </label>
                    </div>

                    <!-- Marketing Consent -->
                    <div class="mt-4">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   name="marketing_consent" 
                                   value="1"
                                   class="checkbox checkbox-sm checkbox-primary mr-3"
                                   {{ old('marketing_consent') ? 'checked' : '' }}>
                            <span class="text-sm text-gray-600">I'd like to receive promotional offers and updates</span>
                        </label>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button type="submit" class="btn btn-spa-primary btn-lg px-8">
                        Continue to Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enhanced phone number formatting
    function formatPhoneInput(input) {
        let value = input.value.replace(/\D/g, '');
        
        if (value.startsWith('254')) {
            value = '+254 ' + value.slice(3, 6) + ' ' + value.slice(6, 9) + ' ' + value.slice(9, 12);
        } else if (value.startsWith('0')) {
            value = value.slice(0, 4) + ' ' + value.slice(4, 7) + ' ' + value.slice(7, 10);
        }
        
        input.value = value.slice(0, 17); // Limit length
    }

    // Auto-format phone number
    document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
        formatPhoneInput(e.target);
    });

    // Form validation feedback
    const form = document.getElementById('clientForm');
    const inputs = form.querySelectorAll('input[required], textarea[required]');
    
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.classList.add('input-error');
            } else {
                this.classList.remove('input-error');
            }
        });

        input.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.classList.remove('input-error');
            }
        });
    });

    // Email validation
    const emailInput = document.querySelector('input[name="email"]');
    emailInput.addEventListener('blur', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (this.value && !emailRegex.test(this.value)) {
            this.classList.add('input-error');
        }
    });

    // Form submission loading state
    form.addEventListener('submit', function() {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <span class="loading loading-spinner loading-sm mr-2"></span>
            Processing...
        `;
    });
</script>
@endpush