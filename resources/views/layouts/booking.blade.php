<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Book Appointment') - {{ config('app.name', 'Ascend Spa') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles

    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #f9fafb;
        }

        .notification-enter {
            transition: all 0.3s ease;
            transform: translateX(100%);
        }

        .notification-enter-active {
            transform: translateX(0);
        }

        .notification-exit {
            transition: all 0.3s ease;
            transform: translateX(0);
        }

        .notification-exit-active {
            transform: translateX(100%);
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">
    <!-- Booking Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gray-900 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-lg">A</span>
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold text-gray-900">Ascend Spa</h1>
                            <p class="text-sm text-gray-600">Book Your Experience</p>
                        </div>
                    </a>
                </div>

                <!-- Help & Exit -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <button
                        class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        Help
                    </button>
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Exit
                    </a>
                    <a href="tel:+1234567890"
                        class="inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        Call Us
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 py-8 sm:py-12">
        @yield('content')
    </main>

    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-20 right-4 z-50 space-y-2"></div>

    <!-- Scripts -->
    @fluxScripts
    @livewireScripts

    <script>
        // Global booking utilities
        window.BookingUtils = {
            formatCurrency: (amount) => {
                return new Intl.NumberFormat('en-KE', {
                    style: 'currency',
                    currency: 'KES',
                    minimumFractionDigits: 0
                }).format(amount);
            },

            formatTime: (time) => {
                return new Date(`2000-01-01 ${time}`).toLocaleTimeString('en-US', {
                    hour: 'numeric',
                    minute: '2-digit',
                    hour12: true
                });
            },

            formatDate: (date) => {
                return new Date(date).toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            },

            showNotification: (message, type = 'success') => {
                const container = document.getElementById('toast-container');
                if (!container) return;

                // Create notification
                const notification = document.createElement('div');
                notification.className = `max-w-sm bg-white border ${
                    type === 'success' ? 'border-green-200' : 
                    type === 'error' ? 'border-red-200' : 
                    'border-blue-200'
                } rounded-md shadow-lg p-4 notification-enter transform transition-all duration-300`;
                
                const iconColor = type === 'success' ? 'text-green-500' : 
                                 type === 'error' ? 'text-red-500' : 'text-blue-500';
                const textColor = type === 'success' ? 'text-green-700' : 
                                 type === 'error' ? 'text-red-700' : 'text-blue-700';
                
                const iconPath = type === 'success' ? 
                    'M5 13l4 4L19 7' :
                    type === 'error' ? 
                    'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' :
                    'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';

                notification.innerHTML = `
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 ${iconColor}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${iconPath}"></path>
                        </svg>
                        <div class="flex-1">
                            <p class="text-sm font-medium ${textColor}">${message}</p>
                        </div>
                        <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                `;

                container.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.classList.add('notification-enter-active');
                    notification.classList.remove('notification-enter');
                }, 100);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (notification.parentElement) {
                        notification.classList.add('notification-exit');
                        notification.classList.remove('notification-enter-active');
                        setTimeout(() => {
                            if (notification.parentElement) {
                                notification.remove();
                            }
                        }, 300);
                    }
                }, 5000);
            }
        };

        // Alpine.js global store for booking
        document.addEventListener('alpine:init', () => {
            Alpine.store('booking', {
                step: 1,
                loading: false,

                nextStep() {
                    if (this.step < 8) {
                        this.step++;
                        this.scrollToTop();
                    }
                },

                previousStep() {
                    if (this.step > 1) {
                        this.step--;
                        this.scrollToTop();
                    }
                },

                setStep(step) {
                    this.step = step;
                    this.scrollToTop();
                },

                scrollToTop() {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });

        // Show flash messages as toasts
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                BookingUtils.showNotification('{{ session('success') }}', 'success');
            @endif

            @if(session('error'))
                BookingUtils.showNotification('{{ session('error') }}', 'error');
            @endif

            @if(session('info'))
                BookingUtils.showNotification('{{ session('info') }}', 'info');
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    BookingUtils.showNotification('{{ $error }}', 'error');
                @endforeach
            @endif
        });
    </script>

    @stack('scripts')
</body>

</html>