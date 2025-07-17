@extends('layouts.booking')

@section('title', 'Select Date & Time - Book Your Spa Experience')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .date-option.selected {
            border-color: #1f2937;
            background-color: #1f2937;
            color: white;
        }

        .date-option.selected .text-gray-600,
        .date-option.selected .text-gray-900,
        .date-option.selected .text-gray-500 {
            color: white;
        }

        .time-slot {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .time-slot:hover:not(.disabled) {
            border-color: #1f2937;
            background-color: #f3f4f6;
        }

        .time-slot.selected {
            border-color: #1f2937;
            background-color: #1f2937;
            color: white;
        }

        .time-slot.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #f9fafb;
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
                        <li>
                            <a href="{{ route('booking.staff') }}" class="hover:text-gray-700 transition-colors">Staff</a>
                        </li>
                        <li>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </li>
                        <li class="text-gray-900 font-medium">Date & Time</li>
                    </ol>
                </nav>

                <div class="text-center">
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-900 mb-2">Select Appointment Time</h1>
                    <p class="text-gray-600 text-base sm:text-lg">
                        Choose a date and time for your <span class="font-medium">{{ $service->name }}</span>
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        @if($staff)
                            with {{ $staff->name }} at {{ $branch->name }}
                        @else
                            Auto-assigned therapist at {{ $branch->name }}
                        @endif
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
                        <div class="w-4 sm:w-6 h-px bg-green-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-600">Staff</span>
                        </div>
                        <div class="w-4 sm:w-6 h-px bg-gray-200"></div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-900 rounded-full flex items-center justify-center">
                                <span class="text-white text-xs font-medium">4</span>
                            </div>
                            <span class="ml-2 text-xs sm:text-sm text-gray-900 font-medium">Date & Time</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- DateTime Selection Section -->
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
                        Back to Staff
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                <!-- Date Selection -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 sm:p-6">
                    <h3 class="text-lg sm:text-xl font-medium text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Select Date
                    </h3>

                    <!-- Compact Date Picker with Navigation -->
                    <div class="space-y-4" id="calendar-container">
                        @if($availableDates && count($availableDates) > 0)
                            <!-- Date Navigation -->
                            <div class="flex items-center justify-between mb-4">
                                <button type="button" id="prev-dates" 
                                    class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <span class="text-sm font-medium text-gray-700" id="date-range-display">Select a date</span>
                                <button type="button" id="next-dates"
                                    class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Date Grid (showing 6 dates at a time) -->
                            <div class="grid grid-cols-3 sm:grid-cols-6 gap-3" id="date-grid">
                                <!-- Dates will be populated by JavaScript -->
                            </div>

                            <!-- Hidden data for JavaScript -->
                            <script type="application/json" id="available-dates-data">
                                @json($availableDates)
                            </script>
                        @else
                            <div class="text-center py-8">
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">No Available Dates</h4>
                                <p class="text-gray-600 text-sm">Please try a different service or staff member.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Time Selection -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 sm:p-6">
                    <h3 class="text-lg sm:text-xl font-medium text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Select Time
                    </h3>

                    <div id="time-slots-container">
                        <div class="text-center py-8">
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-sm">Please select a date first to see available times</p>
                        </div>
                    </div>

                    <!-- Loading indicator for time slots -->
                    <div id="time-slots-loading" class="hidden text-center py-8">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-gray-600 animate-spin" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-600 text-sm">Loading available times...</p>
                    </div>
                </div>
            </div>

            <!-- Continue Button -->
            <div class="mt-6 sm:mt-8 text-center">
                <form action="{{ route('booking.select-datetime') }}" method="POST" id="datetime-form" class="hidden">
                    @csrf
                    <input type="hidden" name="date" id="selected-date">
                    <input type="hidden" name="time" id="selected-time">
                    <button type="submit"
                        class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 bg-gray-900 text-white text-sm sm:text-base font-medium rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Continue to Client Information
                    </button>
                </form>
            </div>
        </div>

        <!-- Booking Summary Sidebar -->
        <div id="booking-summary" class="bg-white border-t border-gray-100 p-4 sm:p-6 lg:p-8">
            <div class="max-w-7xl mx-auto text-center">
                <div class="text-sm text-gray-600 mb-2">Your Selection:</div>
                <div class="text-base sm:text-lg font-medium text-gray-900">
                    {{ $service->name }} • KES {{ number_format($service->price, 0) }}
                </div>
                <div class="text-sm text-gray-600">
                    @if($staff)
                        with {{ $staff->name }} at {{ $branch->name }}
                    @else
                        Auto-assigned therapist at {{ $branch->name }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedDate = null;
        let selectedTime = null;
        let availableDates = [];
        let currentDateIndex = 0;
        const datesPerPage = 6;

        // Initialize dates from server data
        document.addEventListener('DOMContentLoaded', function() {
            const datesData = document.getElementById('available-dates-data');
            if (datesData) {
                availableDates = JSON.parse(datesData.textContent);
                renderDateGrid();
                setupDateNavigation();
            }
        });

        function renderDateGrid() {
            const grid = document.getElementById('date-grid');
            const startIndex = currentDateIndex;
            const endIndex = Math.min(startIndex + datesPerPage, availableDates.length);
            
            let html = '';
            for (let i = startIndex; i < endIndex; i++) {
                const date = availableDates[i];
                const dayLabel = date.is_today ? 'Today' : 
                               date.is_tomorrow ? 'Tomorrow' : 
                               date.day_name.substring(0, 3);
                               
                html += `
                    <div class="date-option cursor-pointer p-3 border border-gray-200 rounded-md hover:border-gray-400 hover:bg-gray-50 transition-all duration-200 text-center"
                        data-date="${date.date}" onclick="selectDate('${date.date}')">
                        <div class="text-xs text-gray-600 font-medium mb-1">${dayLabel}</div>
                        <div class="text-sm font-semibold text-gray-900">${date.formatted}</div>
                    </div>
                `;
            }
            
            grid.innerHTML = html;
            updateDateRangeDisplay();
            updateNavigationButtons();
        }

        function updateDateRangeDisplay() {
            const display = document.getElementById('date-range-display');
            const startIndex = currentDateIndex;
            const endIndex = Math.min(startIndex + datesPerPage - 1, availableDates.length - 1);
            
            if (availableDates.length > 0) {
                const startDate = availableDates[startIndex];
                const endDate = availableDates[endIndex];
                display.textContent = `${startDate.formatted} - ${endDate.formatted}`;
            }
        }

        function updateNavigationButtons() {
            const prevBtn = document.getElementById('prev-dates');
            const nextBtn = document.getElementById('next-dates');
            
            prevBtn.disabled = currentDateIndex === 0;
            nextBtn.disabled = currentDateIndex + datesPerPage >= availableDates.length;
        }

        function setupDateNavigation() {
            document.getElementById('prev-dates').addEventListener('click', function() {
                if (currentDateIndex > 0) {
                    currentDateIndex = Math.max(0, currentDateIndex - datesPerPage);
                    renderDateGrid();
                }
            });

            document.getElementById('next-dates').addEventListener('click', function() {
                if (currentDateIndex + datesPerPage < availableDates.length) {
                    currentDateIndex = Math.min(availableDates.length - datesPerPage, currentDateIndex + datesPerPage);
                    renderDateGrid();
                }
            });
        }

        function selectDate(date) {
            selectedDate = date;
            selectedTime = null;

            // Update UI
            document.querySelectorAll('.date-option').forEach(el => {
                el.classList.remove('selected');
            });
            document.querySelector(`[data-date="${date}"]`).classList.add('selected');

            // Update form
            document.getElementById('selected-date').value = date;
            document.getElementById('selected-time').value = '';

            // Hide form until time is selected
            document.getElementById('datetime-form').classList.add('hidden');

            // Load time slots
            loadTimeSlots(date);
        }

        function selectTime(time, staffId = '', staffName = '') {
            selectedTime = time;

            // Update UI
            document.querySelectorAll('.time-slot').forEach(el => {
                el.classList.remove('selected');
            });
            document.querySelector(`[data-time="${time}"]`).classList.add('selected');

            // Update form
            document.getElementById('selected-time').value = time;

            // Store staff information for potential use
            window.selectedStaffId = staffId;
            window.selectedStaffName = staffName;

            // Show success notification with staff info
            if (window.BookingUtils) {
                const timeFormatted = formatTime(time);
                const dateFormatted = new Date(selectedDate).toLocaleDateString('en-US', {
                    weekday: 'long', 
                    month: 'long', 
                    day: 'numeric'
                });
                
                let message = `Time selected: ${timeFormatted} on ${dateFormatted}`;
                if (staffName) {
                    message += ` with ${staffName}`;
                }
                
                window.BookingUtils.showNotification(message, 'success');
            }

            // Show continue button and toggle sticky summary
            document.getElementById('datetime-form').classList.remove('hidden');
            const summary = document.getElementById('booking-summary');
            if (window.innerWidth < 1024) {
                summary.classList.add('summary-sticky');
            }

            // Scroll to button on mobile
            if (window.innerWidth < 1024) {
                document.getElementById('datetime-form').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }

        async function loadTimeSlots(date) {
            const container = document.getElementById('time-slots-container');
            const loading = document.getElementById('time-slots-loading');

            // Show loading
            container.innerHTML = '';
            loading.classList.remove('hidden');

            try {
                const response = await fetch(`{{ route('booking.get-timeslots') }}?date=${date}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const data = await response.json();

                // Hide loading
                loading.classList.add('hidden');

                if (data.success && data.timeSlots && data.timeSlots.length > 0) {
                    renderTimeSlots(data.timeSlots);
                    
                    // Show success notification if staff-specific
                    if (data.staff_specific && window.BookingUtils) {
                        window.BookingUtils.showNotification('Time slots loaded for your selected staff member.', 'info');
                    }
                } else {
                    const errorMessage = data.message || 'All time slots are booked for this date. Please select another date.';
                    container.innerHTML = `
                            <div class="text-center py-8">
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">No Available Times</h4>
                                <p class="text-gray-600 text-sm">${errorMessage}</p>
                            </div>
                        `;
                }
            } catch (error) {
                console.error('Error loading time slots:', error);
                loading.classList.add('hidden');
                
                // Show error notification
                if (window.BookingUtils) {
                    window.BookingUtils.showNotification('Failed to load time slots. Please try again.', 'error');
                }
                
                container.innerHTML = `
                        <div class="text-center py-8">
                            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-medium text-red-900 mb-2">Error Loading Times</h4>
                            <p class="text-red-600 text-sm">Please try again or contact support.</p>
                            <button onclick="loadTimeSlots('${selectedDate}')" class="mt-2 text-sm text-red-600 hover:text-red-800 underline">
                                Try Again
                            </button>
                        </div>
                    `;
            }
        }

        function renderTimeSlots(timeSlots) {
            const container = document.getElementById('time-slots-container');

            // Group time slots by period
            const morningSlots = timeSlots.filter(slot => {
                const hour = parseInt(slot.time.split(':')[0]);
                return hour < 12;
            });

            const afternoonSlots = timeSlots.filter(slot => {
                const hour = parseInt(slot.time.split(':')[0]);
                return hour >= 12;
            });

            let html = '';

            if (morningSlots.length > 0) {
                html += `
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                Morning
                            </h4>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    `;

                morningSlots.forEach(slot => {
                    const disabled = !slot.available ? 'disabled' : '';
                    const staffInfo = slot.staff_name ? `<div class="text-xs text-gray-600 mt-1">with ${slot.staff_name}</div>` : '';
                    html += `
                            <div class="time-slot p-3 border border-gray-200 rounded-md text-center ${disabled}"
                                 data-time="${slot.time}"
                                 data-staff-id="${slot.staff_id || ''}"
                                 data-staff-name="${slot.staff_name || ''}"
                                 ${slot.available ? `onclick="selectTime('${slot.time}', '${slot.staff_id || ''}', '${slot.staff_name || ''}')"` : ''}>
                                <div class="text-sm font-medium text-gray-900">${formatTime(slot.time)}</div>
                                ${staffInfo}
                                ${!slot.available ? '<div class="text-xs text-gray-500">Booked</div>' : ''}
                            </div>
                        `;
                });

                html += '</div></div>';
            }

            if (afternoonSlots.length > 0) {
                html += `
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                </svg>
                                Afternoon
                            </h4>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    `;

                afternoonSlots.forEach(slot => {
                    const disabled = !slot.available ? 'disabled' : '';
                    const staffInfo = slot.staff_name ? `<div class="text-xs text-gray-600 mt-1">with ${slot.staff_name}</div>` : '';
                    html += `
                            <div class="time-slot p-3 border border-gray-200 rounded-md text-center ${disabled}"
                                 data-time="${slot.time}"
                                 data-staff-id="${slot.staff_id || ''}"
                                 data-staff-name="${slot.staff_name || ''}"
                                 ${slot.available ? `onclick="selectTime('${slot.time}', '${slot.staff_id || ''}', '${slot.staff_name || ''}')"` : ''}>
                                <div class="text-sm font-medium text-gray-900">${formatTime(slot.time)}</div>
                                ${staffInfo}
                                ${!slot.available ? '<div class="text-xs text-gray-500">Booked</div>' : ''}
                            </div>
                        `;
                });

                html += '</div></div>';
            }

            container.innerHTML = html;
        }

        function formatTime(time) {
            const [hours, minutes] = time.split(':');
            const hour = parseInt(hours);
            const ampm = hour >= 12 ? 'PM' : 'AM';
            const displayHour = hour % 12 || 12;
            return `${displayHour}:${minutes} ${ampm}`;
        }

    </script>
@endsection