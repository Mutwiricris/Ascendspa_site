<div class="container mx-auto px-4 max-w-4xl">
    <!-- Progress Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Book Your Appointment</h2>
            <div class="text-sm text-gray-600">
                Step {{ $currentStep }} of 6
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
            <div class="bg-gradient-to-r from-spa-primary to-spa-secondary h-2 rounded-full transition-all duration-500 ease-out" 
                 style="width: {{ ($currentStep / 6) * 100 }}%"></div>
        </div>

        <!-- Step Indicators -->
        <div class="flex items-center justify-between text-xs">
            @php
                $steps = [
                    1 => 'Location',
                    2 => 'Service', 
                    3 => 'Date',
                    4 => 'Time',
                    5 => 'Details',
                    6 => 'Confirm'
                ];
            @endphp
            
            @foreach($steps as $stepNum => $stepName)
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center mb-2 transition-all duration-300
                        {{ $currentStep >= $stepNum ? 'bg-spa-primary text-white' : 'bg-gray-200 text-gray-600' }}">
                        <span class="text-xs font-semibold">{{ $stepNum }}</span>
                    </div>
                    <span class="text-xs {{ $currentStep >= $stepNum ? 'text-spa-primary font-semibold' : 'text-gray-500' }}">
                        {{ $stepName }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="booking-container rounded-3xl shadow-spa-xl p-8 mb-8">
        
        @if($currentStep == 1)
            <!-- Step 1: Branch Selection -->
            <div class="animate-fade-in">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Choose Your Location</h3>
                <p class="text-gray-600 mb-8">Select the branch where you'd like to receive your service.</p>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($branches as $branch)
                        <div class="card-spa rounded-2xl p-6 cursor-pointer transform transition-all duration-300 hover:scale-105"
                             wire:click="selectBranch({{ $branch['id'] }})"
                             role="button">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-spa-accent rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-spa-primary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-lg text-gray-900 mb-2">{{ $branch['name'] }}</h4>
                                <p class="text-gray-600 text-sm mb-3">{{ $branch['address'] }}</p>
                                <p class="text-spa-primary text-sm font-semibold">{{ $branch['phone'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        @elseif($currentStep == 2)
            <!-- Step 2: Service Selection -->
            <div class="animate-fade-in">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Choose Your Service</h3>
                        <p class="text-gray-600">What would you like to experience today?</p>
                    </div>
                    <button wire:click="previousStep" class="btn btn-outline btn-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </button>
                </div>

                @if($this->selectedBranch)
                    <div class="mb-4 p-4 bg-spa-accent/20 rounded-xl">
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold">Selected Location:</span> {{ $this->selectedBranch['name'] }}
                        </p>
                    </div>
                @endif
                
                <div class="space-y-6">
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
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                @foreach($categoryServices as $service)
                                    <div class="card-spa rounded-xl p-6 cursor-pointer transform transition-all duration-300 hover:scale-105"
                                         wire:click="selectService({{ $service['id'] }})"
                                         role="button">
                                        <div class="flex justify-between items-start mb-3">
                                            <h5 class="font-bold text-gray-900">{{ $service['name'] }}</h5>
                                            <span class="text-lg font-bold text-spa-primary">
                                                KSh {{ number_format($service['price']) }}
                                            </span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-3">{{ $service['description'] }}</p>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $service['duration'] }} minutes
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        @elseif($currentStep == 3)
            <!-- Step 3: Date Selection -->
            <div class="animate-fade-in">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Select Date</h3>
                        <p class="text-gray-600">When would you like your appointment?</p>
                    </div>
                    <button wire:click="previousStep" class="btn btn-outline btn-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </button>
                </div>

                @if($this->selectedService)
                    <div class="mb-6 p-4 bg-spa-accent/20 rounded-xl">
                        <p class="text-sm text-gray-700 mb-1">
                            <span class="font-semibold">Selected Service:</span> {{ $this->selectedService['name'] }}
                        </p>
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold">Duration:</span> {{ $this->selectedService['duration'] }} minutes | 
                            <span class="font-semibold">Price:</span> KSh {{ number_format($this->selectedService['price']) }}
                        </p>
                    </div>
                @endif

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @forelse($availableDates as $dateOption)
                        <div class="card-spa rounded-xl p-4 cursor-pointer transform transition-all duration-300 hover:scale-105 text-center"
                             wire:click="selectDate('{{ $dateOption['date'] }}')"
                             role="button">
                            <div class="text-lg font-bold text-gray-900 mb-1">
                                {{ Carbon\Carbon::parse($dateOption['date'])->format('M j') }}
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
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8">
                            <div class="text-gray-500 mb-4">
                                <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">No available dates found for this service.</p>
                            <button wire:click="previousStep" class="btn btn-spa-primary btn-sm mt-4">
                                Choose Different Service
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>

        @elseif($currentStep == 4)
            <!-- Step 4: Time Slot Selection -->
            <div class="animate-fade-in">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Select Time</h3>
                        <p class="text-gray-600">Choose your preferred appointment time.</p>
                    </div>
                    <button wire:click="previousStep" class="btn btn-outline btn-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </button>
                </div>

                @if($selectedDate)
                    <div class="mb-6 p-4 bg-spa-accent/20 rounded-xl">
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold">Selected Date:</span> 
                            {{ Carbon\Carbon::parse($selectedDate)->format('l, F j, Y') }}
                        </p>
                    </div>
                @endif

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                    @forelse($timeSlots as $slot)
                        <button class="time-slot rounded-xl p-4 text-center transition-all duration-200 hover:shadow-md"
                                wire:click="selectTimeSlot({{ json_encode($slot) }})"
                                {{ $slot['available'] ? '' : 'disabled' }}>
                            <div class="font-semibold text-sm">{{ $slot['formatted_time'] ?? $slot['time'] }}</div>
                            @if(isset($slot['staff_name']))
                                <div class="text-xs text-gray-500 mt-1">{{ $slot['staff_name'] }}</div>
                            @endif
                        </button>
                    @empty
                        <div class="col-span-full text-center py-8">
                            <div class="text-gray-500 mb-4">
                                <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">No available time slots for this date.</p>
                            <button wire:click="previousStep" class="btn btn-spa-primary btn-sm mt-4">
                                Choose Different Date
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>

        @elseif($currentStep == 5)
            <!-- Step 5: Client Information -->
            <div class="animate-fade-in">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Your Information</h3>
                        <p class="text-gray-600">Please provide your contact details.</p>
                    </div>
                    <button wire:click="previousStep" class="btn btn-outline btn-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </button>
                </div>

                <div class="max-w-2xl mx-auto">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">First Name *</label>
                            <input type="text" 
                                   wire:model.live="clientInfo.first_name"
                                   class="input input-bordered w-full"
                                   placeholder="Enter your first name">
                            @error('clientInfo.first_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name *</label>
                            <input type="text" 
                                   wire:model.live="clientInfo.last_name"
                                   class="input input-bordered w-full"
                                   placeholder="Enter your last name">
                            @error('clientInfo.last_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                            <input type="email" 
                                   wire:model.live="clientInfo.email"
                                   class="input input-bordered w-full"
                                   placeholder="your@email.com">
                            @error('clientInfo.email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" 
                                   wire:model.live="clientInfo.phone"
                                   class="input input-bordered w-full"
                                   placeholder="+254712345678 or 0712345678">
                            @error('clientInfo.phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth (Optional)</label>
                            <input type="date" 
                                   wire:model="clientInfo.date_of_birth"
                                   class="input input-bordered w-full">
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Gender (Optional)</label>
                            <select wire:model="clientInfo.gender" class="select select-bordered w-full">
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                <option value="prefer_not_to_say">Prefer not to say</option>
                            </select>
                        </div>
                    </div>

                    <!-- Allergies -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Allergies & Medical Notes *</label>
                        <textarea wire:model.live="clientInfo.allergies"
                                  class="textarea textarea-bordered w-full h-24"
                                  placeholder="Please list any allergies or medical conditions we should be aware of, or write 'None'"></textarea>
                        @error('clientInfo.allergies')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Special Notes -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Special Requests (Optional)</label>
                        <textarea wire:model="clientInfo.notes"
                                  class="textarea textarea-bordered w-full h-20"
                                  placeholder="Any special requests or preferences for your appointment..."></textarea>
                    </div>

                    <!-- Account Creation -->
                    <div class="mt-6 p-4 bg-spa-accent/20 rounded-xl">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Account Preferences</label>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" 
                                       wire:model="clientInfo.create_account_status" 
                                       value="no_creation" 
                                       class="radio radio-sm radio-primary mr-3">
                                <span class="text-sm">Book as guest (no account needed)</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" 
                                       wire:model="clientInfo.create_account_status" 
                                       value="accepted" 
                                       class="radio radio-sm radio-primary mr-3">
                                <span class="text-sm">Create account for future bookings</span>
                            </label>
                        </div>

                        <!-- Marketing Consent -->
                        <div class="mt-4">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" 
                                       wire:model="clientInfo.marketing_consent" 
                                       class="checkbox checkbox-sm checkbox-primary mr-3">
                                <span class="text-sm text-gray-600">I'd like to receive promotional offers and updates</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <button wire:click="nextStep" 
                                class="btn btn-spa-primary btn-lg px-8"
                                wire:loading.attr="disabled">
                            <span wire:loading.remove>Continue</span>
                            <span wire:loading>
                                <span class="loading loading-spinner loading-sm mr-2"></span>
                                Processing...
                            </span>
                        </button>
                    </div>
                </div>
            </div>

        @elseif($currentStep == 6 && !$bookingReference)
            <!-- Step 6: Review & Confirm -->
            <div class="animate-fade-in">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Payment Method</h3>
                        <p class="text-gray-600">How would you like to pay for your service?</p>
                    </div>
                    <button wire:click="previousStep" class="btn btn-outline btn-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </button>
                </div>

                <div class="max-w-xl mx-auto">
                    <div class="space-y-4">
                        <!-- Pay on Site -->
                        <label class="card-spa rounded-xl p-6 cursor-pointer flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="radio" 
                                       wire:model="paymentMethod" 
                                       value="cash" 
                                       class="radio radio-primary mr-4">
                                <div>
                                    <h4 class="font-bold text-gray-900">Pay on Site</h4>
                                    <p class="text-gray-600 text-sm">Cash or card payment at the spa</p>
                                </div>
                            </div>
                            <div class="text-2xl">💳</div>
                        </label>

                        <!-- M-Pesa -->
                        <label class="card-spa rounded-xl p-6 cursor-pointer flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="radio" 
                                       wire:model="paymentMethod" 
                                       value="mpesa" 
                                       class="radio radio-primary mr-4">
                                <div>
                                    <h4 class="font-bold text-gray-900">M-Pesa</h4>
                                    <p class="text-gray-600 text-sm">Pay securely with your mobile money</p>
                                </div>
                            </div>
                            <div class="text-2xl">📱</div>
                        </label>
                    </div>

                    <div class="mt-8 text-center">
                        <button wire:click="nextStep" class="btn btn-spa-primary btn-lg px-8">
                            Review Booking
                        </button>
                    </div>
                </div>
            </div>

        @elseif($currentStep == 7 && !$bookingReference)
            <!-- Step 7: Review & Confirm -->
            <div class="animate-fade-in">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Review Your Booking</h3>
                
                <div class="max-w-2xl mx-auto">
                    <!-- Booking Summary -->
                    <div class="card-spa rounded-2xl p-8 mb-6">
                        <h4 class="text-lg font-bold text-gray-900 mb-6">Appointment Details</h4>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between py-3 border-b border-gray-100">
                                <span class="text-gray-600">Location</span>
                                <span class="font-semibold">{{ $this->selectedBranch['name'] ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between py-3 border-b border-gray-100">
                                <span class="text-gray-600">Service</span>
                                <span class="font-semibold">{{ $this->selectedService['name'] ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between py-3 border-b border-gray-100">
                                <span class="text-gray-600">Date</span>
                                <span class="font-semibold">
                                    {{ $selectedDate ? Carbon\Carbon::parse($selectedDate)->format('l, F j, Y') : 'N/A' }}
                                </span>
                            </div>
                            <div class="flex justify-between py-3 border-b border-gray-100">
                                <span class="text-gray-600">Time</span>
                                <span class="font-semibold">{{ $selectedTimeSlot['formatted_time'] ?? 'N/A' }}</span>
                            </div>
                            @if($this->selectedStaff)
                                <div class="flex justify-between py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Specialist</span>
                                    <span class="font-semibold">{{ $this->selectedStaff->name }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between py-3 border-b border-gray-100">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-semibold">{{ $this->selectedService['duration'] ?? 0 }} minutes</span>
                            </div>
                            <div class="flex justify-between py-3 border-b border-gray-100">
                                <span class="text-gray-600">Payment Method</span>
                                <span class="font-semibold capitalize">{{ str_replace('_', ' ', $paymentMethod) }}</span>
                            </div>
                            <div class="flex justify-between items-center pt-4">
                                <span class="text-xl font-bold text-gray-900">Total</span>
                                <span class="text-2xl font-bold text-spa-primary">
                                    KSh {{ number_format($this->selectedService['price'] ?? 0) }}
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
                                <span class="font-semibold">{{ $clientInfo['first_name'] }} {{ $clientInfo['last_name'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Email</span>
                                <span class="font-semibold">{{ $clientInfo['email'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Phone</span>
                                <span class="font-semibold">{{ $clientInfo['phone'] }}</span>
                            </div>
                            @if($clientInfo['notes'])
                                <div class="pt-3 border-t border-gray-100">
                                    <span class="text-gray-600 block mb-1">Special Requests</span>
                                    <span class="text-sm">{{ $clientInfo['notes'] }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Terms and Actions -->
                    <div class="text-center space-y-4">
                        <p class="text-xs text-gray-500">
                            By confirming this booking, you agree to our terms of service and cancellation policy.
                            You can cancel or modify your booking up to 24 hours before your appointment.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button wire:click="previousStep" class="btn btn-outline btn-lg px-8">
                                Make Changes
                            </button>
                            <button wire:click="submitBooking" 
                                    class="btn btn-spa-primary btn-lg px-8"
                                    wire:loading.attr="disabled">
                                <span wire:loading.remove>Confirm Booking</span>
                                <span wire:loading>
                                    <span class="loading loading-spinner loading-sm mr-2"></span>
                                    Creating Booking...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Confirmation Step -->
            <div class="animate-fade-in text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-10 h-10 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Booking Confirmed!</h3>
                <p class="text-xl text-gray-600 mb-6">Your appointment has been successfully booked.</p>
                
                <div class="bg-spa-accent/20 rounded-2xl p-6 mb-8 max-w-md mx-auto">
                    <h4 class="font-bold text-lg text-gray-900 mb-4">Booking Reference</h4>
                    <div class="text-2xl font-bold text-spa-primary mb-2">{{ $bookingReference }}</div>
                    <p class="text-sm text-gray-600">Save this reference number for your records</p>
                </div>
                
                <div class="space-y-4">
                    <p class="text-gray-600">
                        A confirmation email has been sent to <strong>{{ $clientInfo['email'] }}</strong>
                    </p>
                    <p class="text-gray-600">
                        You will receive a reminder 24 hours before your appointment.
                    </p>
                </div>
                
                <div class="mt-8 space-x-4">
                    <a href="{{ route('home') }}" class="btn btn-outline btn-lg">
                        Back to Home
                    </a>
                    <button wire:click="resetBooking" class="btn btn-spa-primary btn-lg">
                        Book Another Appointment
                    </button>
                </div>
            </div>
        @endif
    </div>

    <!-- Loading Overlay -->
    <div wire:loading.delay class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-8 text-center">
            <div class="loading loading-spinner loading-lg text-spa-primary mb-4"></div>
            <p class="text-gray-700">Processing your request...</p>
        </div>
    </div>
</div>