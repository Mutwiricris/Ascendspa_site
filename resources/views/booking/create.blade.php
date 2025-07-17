@extends('layouts.booking')

@section('title', 'Book Appointment')

@section('content')
<style>
/* Professional styling with gradients and shadows */
.hero-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.glass-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.selection-card {
    @apply bg-white border-2 border-gray-200 rounded-xl p-6 cursor-pointer transition-all duration-300 hover:shadow-lg hover:-translate-y-1;
}

.selection-card:hover {
    border-color: #3b82f6;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.selection-card.selected {
    @apply border-blue-500 bg-gradient-to-br from-blue-50 to-indigo-50;
    box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.15), 0 10px 10px -5px rgba(59, 130, 246, 0.1);
}

.selection-card.selected::before {
    content: '';
    position: absolute;
    top: 1rem;
    right: 1rem;
    width: 24px;
    height: 24px;
    background: #3b82f6;
    border-radius: 50%;
    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='m13.854 3.646-7.5 7.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6 10.293l7.146-7.147a.5.5 0 0 1 .708.708z'/%3e%3c/svg%3e");
}

.step-indicator {
    @apply w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold transition-all duration-300;
}

.step-indicator.active {
    @apply bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg;
}

.step-indicator.completed {
    @apply bg-green-500 text-white;
}

.step-indicator.inactive {
    @apply bg-gray-200 text-gray-500;
}

.step-line {
    @apply h-0.5 bg-gray-200 transition-all duration-500;
}

.step-line.active {
    @apply bg-gradient-to-r from-blue-500 to-indigo-600;
}

.service-category {
    @apply mb-8;
}

.service-icon {
    @apply w-12 h-12 rounded-full flex items-center justify-center text-2xl mb-4 mx-auto;
}

.date-btn, .time-btn {
    @apply bg-white border-2 border-gray-200 rounded-lg p-3 text-center cursor-pointer transition-all duration-200 hover:border-blue-300 hover:bg-blue-50;
}

.date-btn.selected, .time-btn.selected {
    @apply border-blue-500 bg-blue-500 text-white;
}

.section-card {
    @apply bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8 transition-all duration-300;
}

.section-disabled {
    @apply opacity-60 pointer-events-none;
}

.btn-primary {
    @apply bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1;
}

.summary-item {
    @apply flex justify-between items-center py-3 border-b border-gray-100 last:border-b-0;
}

.branch-info-card {
    @apply bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-6 mb-6;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}
</style>

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50">
    
    <!-- Hero Section -->
    <div class="hero-gradient text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <flux:heading size="2xl" class="mb-4">Book Your Perfect Experience</flux:heading>
            <flux:subheading class="text-blue-100 text-lg mb-8">Transform your day with our premium spa services</flux:subheading>
            
            <!-- Progress Indicator -->
            <div class="flex items-center justify-center space-x-4 max-w-2xl mx-auto">
                <div class="flex items-center space-x-2">
                    <div id="step-1" class="step-indicator active">1</div>
                    <span class="text-sm font-medium">Location</span>
                </div>
                <div class="step-line w-16" id="line-1"></div>
                <div class="flex items-center space-x-2">
                    <div id="step-2" class="step-indicator inactive">2</div>
                    <span class="text-sm font-medium">Service</span>
                </div>
                <div class="step-line w-16" id="line-2"></div>
                <div class="flex items-center space-x-2">
                    <div id="step-3" class="step-indicator inactive">3</div>
                    <span class="text-sm font-medium">Date</span>
                </div>
                <div class="step-line w-16" id="line-3"></div>
                <div class="flex items-center space-x-2">
                    <div id="step-4" class="step-indicator inactive">4</div>
                    <span class="text-sm font-medium">Time</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12 max-w-6xl">
        
        <!-- Selected Branch Info (Hidden initially) -->
        <div id="selected-branch-info" class="branch-info-card animate-fade-in-up" style="display: none;">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <flux:heading id="selected-branch-name" size="lg" class="text-gray-900 mb-1"></flux:heading>
                    <p id="selected-branch-address" class="text-gray-600"></p>
                    <div class="flex items-center mt-2 text-green-600">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm font-medium">Available Today</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Step 1: Location Selection -->
        <div id="location-section" class="section-card animate-fade-in-up">
            <div class="text-center mb-8">
                <flux:heading size="xl" class="mb-2">Choose Your Location</flux:heading>
                <flux:subheading class="text-gray-600">Select the branch where you'd like to receive your service</flux:subheading>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6">
                <div class="selection-card relative branch-card" data-branch-id="1" data-branch-name="Ascend Spa - Westlands" data-branch-address="Westlands Shopping Centre, Ring Road">
                    <div class="text-center">
                        <div class="service-icon bg-gradient-to-br from-emerald-400 to-emerald-600 text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-6a1 1 0 00-1-1H9a1 1 0 00-1 1v6a1 1 0 01-1 1H4a1 1 0 110-2V4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <flux:heading size="base" class="mb-2">Westlands Branch</flux:heading>
                        <p class="text-gray-600 text-sm mb-3">Premium Shopping Centre Location</p>
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Available
                        </div>
                    </div>
                </div>
                
                <div class="selection-card relative branch-card" data-branch-id="2" data-branch-name="Ascend Spa - Karen" data-branch-address="Karen Shopping Centre, Karen Road">
                    <div class="text-center">
                        <div class="service-icon bg-gradient-to-br from-purple-400 to-purple-600 text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.75 2.524z"/>
                            </svg>
                        </div>
                        <flux:heading size="base" class="mb-2">Karen Branch</flux:heading>
                        <p class="text-gray-600 text-sm mb-3">Serene Suburban Environment</p>
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Available
                        </div>
                    </div>
                </div>
                
                <div class="selection-card relative branch-card" data-branch-id="3" data-branch-name="Ascend Spa - CBD" data-branch-address="Kencom House, Moi Avenue">
                    <div class="text-center">
                        <div class="service-icon bg-gradient-to-br from-blue-400 to-blue-600 text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm3 5a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm0 3a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <flux:heading size="base" class="mb-2">CBD Branch</flux:heading>
                        <p class="text-gray-600 text-sm mb-3">Convenient City Center Access</p>
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Available
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 2: Service Selection -->
        <div id="service-section" class="section-card section-disabled">
            <div class="text-center mb-8">
                <flux:heading size="xl" class="mb-2">Choose Your Service</flux:heading>
                <flux:subheading class="text-gray-600">Select from our premium wellness treatments</flux:subheading>
            </div>
            
            <div class="space-y-8">
                <!-- Hair Services -->
                <div class="service-category">
                    <div class="flex items-center mb-6">
                        <div class="service-icon bg-gradient-to-br from-pink-400 to-pink-600 text-white mr-4">
                            ✂️
                        </div>
                        <flux:heading size="lg">Hair Services</flux:heading>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="selection-card relative service-card" data-service-id="1" data-service-name="Hair Cut & Style" data-service-price="2500" data-service-duration="60">
                            <flux:heading size="base" class="mb-2">Hair Cut & Style</flux:heading>
                            <p class="text-gray-600 text-sm mb-3">Professional precision cutting with expert styling</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">KSh 2,500</span>
                                <span class="text-sm text-gray-500">60 minutes</span>
                            </div>
                        </div>
                        <div class="selection-card relative service-card" data-service-id="2" data-service-name="Hair Coloring" data-service-price="4500" data-service-duration="120">
                            <flux:heading size="base" class="mb-2">Hair Coloring</flux:heading>
                            <p class="text-gray-600 text-sm mb-3">Premium color transformation with professional products</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">KSh 4,500</span>
                                <span class="text-sm text-gray-500">120 minutes</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Spa & Massage -->
                <div class="service-category">
                    <div class="flex items-center mb-6">
                        <div class="service-icon bg-gradient-to-br from-green-400 to-green-600 text-white mr-4">
                            💆
                        </div>
                        <flux:heading size="lg">Spa & Massage</flux:heading>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="selection-card relative service-card" data-service-id="3" data-service-name="Swedish Massage" data-service-price="3500" data-service-duration="60">
                            <flux:heading size="base" class="mb-2">Swedish Massage</flux:heading>
                            <p class="text-gray-600 text-sm mb-3">Relaxing full-body massage for stress relief</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">KSh 3,500</span>
                                <span class="text-sm text-gray-500">60 minutes</span>
                            </div>
                        </div>
                        <div class="selection-card relative service-card" data-service-id="4" data-service-name="Deep Tissue Massage" data-service-price="4000" data-service-duration="75">
                            <flux:heading size="base" class="mb-2">Deep Tissue Massage</flux:heading>
                            <p class="text-gray-600 text-sm mb-3">Therapeutic massage targeting muscle tension</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">KSh 4,000</span>
                                <span class="text-sm text-gray-500">75 minutes</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Facial Treatments -->
                <div class="service-category">
                    <div class="flex items-center mb-6">
                        <div class="service-icon bg-gradient-to-br from-yellow-400 to-yellow-600 text-white mr-4">
                            ✨
                        </div>
                        <flux:heading size="lg">Facial Treatments</flux:heading>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="selection-card relative service-card" data-service-id="5" data-service-name="Classic Facial" data-service-price="2000" data-service-duration="45">
                            <flux:heading size="base" class="mb-2">Classic Facial</flux:heading>
                            <p class="text-gray-600 text-sm mb-3">Essential cleansing and moisturizing treatment</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">KSh 2,000</span>
                                <span class="text-sm text-gray-500">45 minutes</span>
                            </div>
                        </div>
                        <div class="selection-card relative service-card" data-service-id="6" data-service-name="Anti-Aging Facial" data-service-price="3500" data-service-duration="75">
                            <flux:heading size="base" class="mb-2">Anti-Aging Facial</flux:heading>
                            <p class="text-gray-600 text-sm mb-3">Advanced treatment for youthful, radiant skin</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">KSh 3,500</span>
                                <span class="text-sm text-gray-500">75 minutes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3: Date Selection -->
        <div id="date-section" class="section-card section-disabled">
            <div class="text-center mb-8">
                <flux:heading size="xl" class="mb-2">Select Your Date</flux:heading>
                <flux:subheading class="text-gray-600">Choose when you'd like your appointment</flux:subheading>
            </div>
            
            <div class="grid grid-cols-4 md:grid-cols-7 gap-3" id="date-grid">
                <!-- Dates will be generated by JavaScript -->
            </div>
        </div>

        <!-- Step 4: Time Selection -->
        <div id="time-section" class="section-card section-disabled">
            <div class="text-center mb-8">
                <flux:heading size="xl" class="mb-2">Choose Your Time</flux:heading>
                <flux:subheading class="text-gray-600">Select your preferred appointment time</flux:subheading>
            </div>
            
            <div class="grid grid-cols-3 md:grid-cols-6 gap-3" id="time-grid">
                <!-- Times will be generated by JavaScript -->
            </div>
        </div>

        <!-- Booking Summary -->
        <div id="summary-section" class="glass-card rounded-2xl p-8" style="display: none;">
            <div class="text-center mb-8">
                <flux:heading size="xl" class="mb-2">Booking Summary</flux:heading>
                <flux:subheading class="text-gray-600">Review your appointment details</flux:subheading>
            </div>
            
            <div class="max-w-md mx-auto space-y-4 mb-8">
                <div class="summary-item">
                    <span class="font-medium text-gray-700">Location:</span>
                    <span id="summary-branch" class="font-semibold text-gray-900"></span>
                </div>
                <div class="summary-item">
                    <span class="font-medium text-gray-700">Service:</span>
                    <span id="summary-service" class="font-semibold text-gray-900"></span>
                </div>
                <div class="summary-item">
                    <span class="font-medium text-gray-700">Date:</span>
                    <span id="summary-date" class="font-semibold text-gray-900"></span>
                </div>
                <div class="summary-item">
                    <span class="font-medium text-gray-700">Time:</span>
                    <span id="summary-time" class="font-semibold text-gray-900"></span>
                </div>
                <div class="summary-item border-t-2 border-gray-200 pt-4">
                    <span class="text-xl font-bold text-gray-900">Total:</span>
                    <span id="summary-price" class="text-2xl font-bold text-blue-600"></span>
                </div>
            </div>
            
            <div class="text-center">
                <button id="book-now-btn" class="btn-primary">
                    <svg class="w-5 h-5 mr-2 inline" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Complete Booking
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let selectedBranch = null;
    let selectedService = null;
    let selectedDate = null;
    let selectedTime = null;
    let currentStep = 1;
    
    // Update step progress with animations
    function updateProgress(step) {
        currentStep = step;
        
        // Update step indicators
        for(let i = 1; i <= 4; i++) {
            const stepIndicator = document.getElementById(`step-${i}`);
            const stepLine = document.getElementById(`line-${i}`);
            
            if(i < step) {
                stepIndicator.className = 'step-indicator completed';
                if(stepLine) stepLine.classList.add('active');
            } else if(i === step) {
                stepIndicator.className = 'step-indicator active';
            } else {
                stepIndicator.className = 'step-indicator inactive';
                if(stepLine) stepLine.classList.remove('active');
            }
        }
        
        // Enable/disable sections with smooth transitions
        const sections = [
            { id: 'service-section', step: 2 },
            { id: 'date-section', step: 3 },
            { id: 'time-section', step: 4 }
        ];
        
        sections.forEach(section => {
            const element = document.getElementById(section.id);
            if(step >= section.step) {
                element.classList.remove('section-disabled');
                element.classList.add('animate-fade-in-up');
            } else {
                element.classList.add('section-disabled');
                element.classList.remove('animate-fade-in-up');
            }
        });
        
        // Show summary when all steps complete
        if(step > 4 && selectedBranch && selectedService && selectedDate && selectedTime) {
            updateSummary();
            document.getElementById('summary-section').style.display = 'block';
            document.getElementById('summary-section').classList.add('animate-fade-in-up');
        }
    }
    
    // Branch selection with enhanced UI
    document.querySelectorAll('.branch-card').forEach(card => {
        card.addEventListener('click', function() {
            selectedBranch = {
                id: this.dataset.branchId,
                name: this.dataset.branchName,
                address: this.dataset.branchAddress
            };
            
            // Update UI
            document.querySelectorAll('.branch-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            
            // Show selected branch info
            const infoCard = document.getElementById('selected-branch-info');
            document.getElementById('selected-branch-name').textContent = selectedBranch.name;
            document.getElementById('selected-branch-address').textContent = selectedBranch.address;
            infoCard.style.display = 'block';
            
            setTimeout(() => updateProgress(2), 300);
        });
    });
    
    // Service selection
    document.querySelectorAll('.service-card').forEach(card => {
        card.addEventListener('click', function() {
            selectedService = {
                id: this.dataset.serviceId,
                name: this.dataset.serviceName,
                price: this.dataset.servicePrice,
                duration: this.dataset.serviceDuration
            };
            
            document.querySelectorAll('.service-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            
            generateDates();
            setTimeout(() => updateProgress(3), 300);
        });
    });
    
    // Generate date options with professional styling
    function generateDates() {
        const dateGrid = document.getElementById('date-grid');
        dateGrid.innerHTML = '';
        
        for(let i = 0; i < 14; i++) {
            const date = new Date();
            date.setDate(date.getDate() + i);
            
            const btn = document.createElement('button');
            btn.className = 'date-btn';
            btn.dataset.date = date.toISOString().split('T')[0];
            
            const isToday = i === 0;
            const dayName = date.toLocaleDateString('en', {weekday: 'short'});
            const monthName = date.toLocaleDateString('en', {month: 'short'});
            
            btn.innerHTML = `
                <div>
                    <div class="text-lg font-bold">${date.getDate()}</div>
                    <div class="text-xs text-gray-600">${monthName}</div>
                    <div class="text-xs text-gray-600">${dayName}</div>
                    ${isToday ? '<div class="text-xs font-medium text-blue-600 mt-1">Today</div>' : ''}
                </div>
            `;
            
            btn.addEventListener('click', function() {
                selectedDate = {
                    date: this.dataset.date,
                    formatted: date.toLocaleDateString('en', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    })
                };
                
                document.querySelectorAll('.date-btn').forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
                
                generateTimes();
                setTimeout(() => updateProgress(4), 300);
            });
            
            dateGrid.appendChild(btn);
        }
    }
    
    // Generate time slots
    function generateTimes() {
        const timeGrid = document.getElementById('time-grid');
        timeGrid.innerHTML = '';
        
        const times = [
            '09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
            '12:00', '12:30', '13:00', '13:30', '14:00', '14:30',
            '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'
        ];
        
        times.forEach(time => {
            const btn = document.createElement('button');
            btn.className = 'time-btn';
            btn.dataset.time = time;
            
            const timeObj = new Date(`2000-01-01 ${time}`);
            const formatted = timeObj.toLocaleTimeString('en', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });
            
            btn.innerHTML = `
                <div class="font-semibold">${formatted}</div>
                <div class="text-xs text-gray-500 mt-1">Available</div>
            `;
            
            btn.addEventListener('click', function() {
                selectedTime = {
                    time: this.dataset.time,
                    formatted: formatted
                };
                
                document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
                
                setTimeout(() => updateProgress(5), 300);
            });
            
            timeGrid.appendChild(btn);
        });
    }
    
    // Update summary with professional formatting
    function updateSummary() {
        if(selectedBranch && selectedService && selectedDate && selectedTime) {
            document.getElementById('summary-branch').textContent = selectedBranch.name;
            document.getElementById('summary-service').textContent = selectedService.name;
            document.getElementById('summary-date').textContent = selectedDate.formatted;
            document.getElementById('summary-time').textContent = selectedTime.formatted;
            document.getElementById('summary-price').textContent = `KSh ${parseInt(selectedService.price).toLocaleString()}`;
        }
    }
    
    // Book now button with professional feedback
    document.getElementById('book-now-btn').addEventListener('click', function() {
        this.innerHTML = '<svg class="w-5 h-5 mr-2 inline animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>Processing...';
        this.disabled = true;
        
        setTimeout(() => {
            alert('🎉 Booking confirmed! You will receive a confirmation email shortly.');
            this.innerHTML = '<svg class="w-5 h-5 mr-2 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>Complete Booking';
            this.disabled = false;
        }, 2000);
    });
});
</script>
@endsection