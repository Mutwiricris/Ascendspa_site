@extends('layouts.booking')

@section('title', 'Select Service - Book Your Spa Experience')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .cart-sticky {
            position: sticky;
            bottom: 0;
        }
    </style>
    <div class="min-h-screen bg-zinc-50">
        <!-- Header Section -->
        <header class="bg-white shadow-sm border-b border-zinc-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Breadcrumb -->
                <nav class="mb-4" aria-label="Breadcrumb">
                    <ol class="flex flex-wrap items-center space-x-2 text-sm">
                        <li>
                            <a href="{{ route('booking.branches') }}"
                                class="text-blue-600 hover:text-blue-800 transition-colors">
                                Branch Selection
                            </a>
                        </li>
                        <li>
                            <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </li>
                        <li class="text-zinc-900 font-medium">Select Service</li>
                    </ol>
                </nav>

                <div class="text-center">
                    <h1 class="text-2xl sm:text-3xl font-bold text-zinc-900 mb-2">Choose Your Wellness Service</h1>
                    <p class="text-base sm:text-lg text-zinc-600">
                        Select from our premium spa treatments at
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-100 text-zinc-800">
                            {{ $branch->name }}
                        </span>
                    </p>
                </div>
            </div>
        </header>

        <!-- Service Tabs -->
        <div class="bg-white border-b border-zinc-200">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-wrap space-x-4 sm:space-x-4">
                    <button onclick="switchTab('services')" id="services-tab"
                        class="px-4 sm:px-6 py-3 sm:py-4 border-b-2 border-blue-500 text-blue-600 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm sm:text-base">
                        Services
                    </button>
                    <button onclick="switchTab('vouchers')" id="vouchers-tab"
                        class="px-4 sm:px-6 py-3 sm:py-4 border-b-2 border-transparent text-zinc-500 hover:text-zinc-700 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm sm:text-base">
                        Gift Vouchers
                    </button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row">
            <!-- Mobile Category Toggle -->
            <div class="lg:hidden bg-white border-b border-zinc-200 p-4">
                <select onchange="switchCategory(this.value)"
                    class="w-full p-2 border border-zinc-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @if($services->count() > 0)
                        @foreach($services as $categoryName => $categoryServices)
                            <option value="{{ $categoryName }}" {{ $loop->first ? 'selected' : '' }}>
                                {{ $categoryName }} ({{ $categoryServices->count() }})
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- Sidebar Categories -->
            <aside class="hidden lg:block w-full lg:w-64 bg-white border-r border-zinc-200">
                <div class="p-4">
                    <div class="mb-4">
                        <form action="{{ route('booking.go-back') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-zinc-700 bg-white border border-zinc-300 rounded-md hover:bg-zinc-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors w-full">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Back to Branches
                            </button>
                        </form>
                    </div>

                    <h2 class="text-sm font-semibold text-zinc-900 mb-4">Categories</h2>
                    <nav class="space-y-1">
                        @if($services->count() > 0)
                            @foreach($services as $categoryName => $categoryServices)
                                <button onclick="switchCategory('{{ $categoryName }}')" id="category-{{ Str::slug($categoryName) }}"
                                    class="category-btn w-full text-left px-3 py-2 rounded-md text-sm font-medium transition-colors {{ $loop->first ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900' }}">
                                    <div class="flex items-center justify-between">
                                        <span>{{ $categoryName }}</span>
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-zinc-200 text-zinc-800">
                                            {{ $categoryServices->count() }}
                                        </span>
                                    </div>
                                </button>
                            @endforeach
                        @endif
                    </nav>
                </div>
            </aside>

            <!-- Main Content Area -->
            <main class="flex-1 p-4 sm:p-6">
                @if($services->count() > 0)
                    @foreach($services as $categoryName => $categoryServices)
                        <div id="category-content-{{ Str::slug($categoryName) }}"
                            class="category-content {{ !$loop->first ? 'hidden' : '' }}">
                            <h2 class="text-xl sm:text-2xl font-bold text-zinc-900 mb-6">{{ $categoryName }}</h2>

                            <!-- Services List -->
                            <div class="space-y-4">
                                @foreach($categoryServices as $service)
                                    <div
                                        class="service-item bg-white rounded-lg border border-zinc-200 p-4 hover:shadow-lg hover:border-zinc-300 transition-all duration-200">
                                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                            <div class="flex-1">
                                                <h3 class="text-base sm:text-lg font-semibold text-zinc-900">{{ $service->name }}</h3>
                                                <div class="flex items-center gap-2 mt-1">
                                                    <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span class="text-sm text-zinc-500">{{ $service->duration_minutes }} minutes</span>
                                                </div>

                                                @if($service->description)
                                                    <p class="text-sm text-zinc-600 mt-2">{{ $service->description }}</p>
                                                @endif

                                                @if($service->is_couple_service || $service->requires_consultation)
                                                    <div class="mt-3 flex flex-wrap gap-2">
                                                        @if($service->is_couple_service)
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                Couple Service
                                                            </span>
                                                        @endif
                                                        @if($service->requires_consultation)
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                                Consultation Required
                                                            </span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                                <span class="text-base sm:text-lg font-bold text-zinc-900">KSh
                                                    {{ number_format($service->price) }}</span>

                                                <div class="cart-controls" id="controls-{{ $service->id }}">
                                                    <button
                                                        onclick="addToCart({{ $service->id }}, '{{ addslashes($service->name) }}', {{ $service->price }}, '{{ $service->duration_minutes }} mins')"
                                                        class="add-btn inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors w-full sm:w-auto">
                                                        Select service
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Empty State -->
                    <div class="bg-white rounded-lg border border-zinc-200 text-center py-12">
                        <div class="flex flex-col items-center">
                            <div class="w-24 h-24 bg-zinc-100 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-12 h-12 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-semibold text-zinc-900 mb-2">No Services Available</h3>
                            <p class="text-zinc-600 mb-6 text-sm sm:text-base">This branch doesn't have services available at
                                the moment.</p>
                            <a href="{{ route('booking.branches') }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                Choose Different Branch
                            </a>
                        </div>
                    </div>
                @endif
            </main>

            <!-- Cart Sidebar -->
            <aside id="cart-sidebar"
                class="w-full lg:w-80 bg-white border-t lg:border-t-0 lg:border-l border-zinc-200 p-4 sm:p-6">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-zinc-900 mb-2">Selected Services</h3>
                    <p class="text-sm text-zinc-500">
                        <span id="cart-count">0</span> service<span id="cart-plural">s</span> selected
                    </p>
                </div>

                <!-- Cart Items -->
                <div id="cart-items" class="space-y-3 mb-6 max-h-[40vh] lg:max-h-none overflow-y-auto">
                    <!-- Cart items will be populated by JavaScript -->
                </div>

                <!-- Empty Cart State -->
                <div id="empty-cart" class="text-center py-8">
                    <div class="w-12 h-12 bg-zinc-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <p class="text-sm text-zinc-500">Your cart is empty</p>
                    <p class="text-xs text-zinc-400 mt-1">Add services to get started</p>
                </div>

                <!-- Cart Total -->
                <div class="border-t border-zinc-200 pt-4 mb-6">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-zinc-900">Total</span>
                        <span class="text-lg font-bold text-zinc-900">KSh <span id="cart-total">0</span></span>
                    </div>
                </div>

                <!-- Checkout Button -->
                <button id="checkout-btn" onclick="proceedToCheckout()"
                    class="w-full inline-flex items-center justify-center px-4 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled>
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                    <span id="checkout-text">Select Services to Continue</span>
                </button>
            </aside>
        </div>
    </div>

    <script>
        let cart = [];
        let activeCategory = '';
        let allServices = @json($services);

        // Initialize first category as active
        @if($services->count() > 0)
            activeCategory = '{{ $services->keys()->first() }}';
        @endif

            function switchTab(tab) {
                // Update tab styling
                document.getElementById('services-tab').className = 'px-4 sm:px-6 py-3 sm:py-4 border-b-2 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm sm:text-base ' +
                    (tab === 'services' ? 'border-blue-500 text-blue-600' : 'border-transparent text-zinc-500 hover:text-zinc-700');
                document.getElementById('vouchers-tab').className = 'px-4 sm:px-6 py-3 sm:py-4 border-b-2 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm sm:text-base ' +
                    (tab === 'vouchers' ? 'border-blue-500 text-blue-600' : 'border-transparent text-zinc-500 hover:text-zinc-700');

                // Handle tab content switching
                if (tab === 'vouchers') {
                    console.log('Switched to Gift Vouchers');
                }
            }

        function switchCategory(category) {
            activeCategory = category;

            // Update category styling (for desktop)
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.className = 'category-btn w-full text-left px-3 py-2 rounded-md text-sm font-medium transition-colors text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900 focus:outline-none';
            });

            const categorySlug = category.toLowerCase().replace(/\s+/g, '-');
            const activeBtn = document.getElementById('category-' + categorySlug);
            if (activeBtn) {
                activeBtn.className = 'category-btn w-full text-left px-3 py-2 rounded-md text-sm font-medium transition-colors bg-zinc-100 text-zinc-900 border-l-2 border-blue-500';
            }

            // Show/hide category content
            document.querySelectorAll('.category-content').forEach(content => {
                content.classList.add('hidden');
            });

            const targetContent = document.getElementById('category-content-' + categorySlug);
            if (targetContent) {
                targetContent.classList.remove('hidden');
            }
        }

        function addToCart(id, name, price, duration) {
            const existingItem = cart.find(item => item.id === id);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ id, name, price, duration, quantity: 1 });
            }

            updateCartDisplay();
            updateServiceControls(id);
        }

        function removeFromCart(id) {
            const itemIndex = cart.findIndex(item => item.id === id);
            if (itemIndex > -1) {
                if (cart[itemIndex].quantity > 1) {
                    cart[itemIndex].quantity -= 1;
                } else {
                    cart.splice(itemIndex, 1);
                }
            }

            updateCartDisplay();
            updateServiceControls(id);
        }

        function updateQuantity(id, quantity) {
            if (quantity === 0) {
                cart = cart.filter(item => item.id !== id);
            } else {
                const item = cart.find(item => item.id === id);
                if (item) {
                    item.quantity = quantity;
                }
            }

            updateCartDisplay();
            updateServiceControls(id);
        }

        function updateServiceControls(serviceId) {
            const controlsElement = document.getElementById('controls-' + serviceId);
            if (!controlsElement) return;

            const cartItem = cart.find(item => item.id === serviceId);

            if (cartItem) {
                controlsElement.innerHTML = `
                        <div class="flex items-center gap-2 bg-zinc-100 rounded-lg p-1">
                            <button 
                                onclick="removeFromCart(${serviceId})"
                                class="w-8 h-8 rounded-md bg-white shadow-sm border border-zinc-200 flex items-center justify-center hover:bg-zinc-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                            >
                                <svg class="w-4 h-4 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </button>
                            <span class="w-8 text-center font-medium text-zinc-900">${cartItem.quantity}</span>
                            <button 
                                onclick="addToCart(${serviceId}, '${cartItem.name.replace(/'/g, "\\'")}', ${cartItem.price}, '${cartItem.duration}')"
                                class="w-8 h-8 rounded-md bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors shadow-sm"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </button>
                        </div>
                    `;
            } else {
                let serviceName = '';
                let servicePrice = 0;
                let serviceDuration = '';

                Object.values(allServices).forEach(categoryServices => {
                    categoryServices.forEach(service => {
                        if (service.id === serviceId) {
                            serviceName = service.name;
                            servicePrice = service.price;
                            serviceDuration = service.duration_minutes + ' mins';
                        }
                    });
                });

                controlsElement.innerHTML = `
                        <button 
                            onclick="addToCart(${serviceId}, '${serviceName.replace(/'/g, "\\'")}', ${servicePrice}, '${serviceDuration}')"
                            class="add-btn inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors w-full sm:w-auto"
                        >
                            Select service
                        </button>
                    `;
            }
        }

        function updateCartDisplay() {
            const cartItemsContainer = document.getElementById('cart-items');
            const emptyCart = document.getElementById('empty-cart');
            const cartCount = document.getElementById('cart-count');
            const cartPlural = document.getElementById('cart-plural');
            const cartTotal = document.getElementById('cart-total');
            const checkoutBtn = document.getElementById('checkout-btn');
            const checkoutText = document.getElementById('checkout-text');
            const cartSidebar = document.getElementById('cart-sidebar');

            // Update cart count and pluralization
            cartCount.textContent = cart.length;
            cartPlural.textContent = cart.length === 1 ? '' : 's';

            // Calculate total
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            cartTotal.textContent = total.toLocaleString();

            // Toggle sticky class based on cart state (only for small screens)
            if (cart.length > 0) {
                checkoutBtn.disabled = false;
                checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                checkoutText.textContent = 'Continue to Staff Selection';
                emptyCart.classList.add('hidden');
                if (window.innerWidth < 1024) { // lg breakpoint
                    cartSidebar.classList.add('cart-sticky');
                }
            } else {
                checkoutBtn.disabled = true;
                checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
                checkoutText.textContent = 'Select Services to Continue';
                emptyCart.classList.remove('hidden');
                cartSidebar.classList.remove('cart-sticky');
            }

            // Update cart items
            if (cart.length > 0) {
                cartItemsContainer.innerHTML = cart.map(item => `
                        <div class="bg-zinc-50 rounded-lg p-3 border border-zinc-200">
                            <div class="flex items-start justify-between mb-2">
                                <div class="flex-1">
                                    <h4 class="font-medium text-sm text-zinc-900">${item.name}</h4>
                                    <p class="text-xs text-zinc-500 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        ${item.duration}
                                    </p>
                                </div>
                                <span class="text-sm font-semibold text-zinc-900">KSh ${(item.price * item.quantity).toLocaleString()}</span>
                            </div>
                            <div class="flex items-center justify-between flex-wrap gap-2">
                                <div class="flex items-center gap-2">
                                    <button 
                                        onclick="updateQuantity(${item.id}, ${item.quantity - 1})"
                                        class="w-7 h-7 rounded-md bg-white shadow-sm border border-zinc-200 flex items-center justify-center hover:bg-zinc-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                                    >
                                        <svg class="w-3 h-3 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <span class="w-8 text-center text-sm font-medium text-zinc-900">${item.quantity}</span>
                                    <button 
                                        onclick="updateQuantity(${item.id}, ${item.quantity + 1})"
                                        class="w-7 h-7 rounded-md bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors shadow-sm"
                                    >
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </div>
                                <button 
                                    onclick="updateQuantity(${item.id}, 0)"
                                    class="text-xs text-red-600 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors"
                                    title="Remove from cart"
                                >
                                    Remove
                                </button>
                            </div>
                        </div>
                    `).join('');
            } else {
                cartItemsContainer.innerHTML = '';
            }
        }

        function proceedToCheckout() {
            if (cart.length === 0) return;

            const firstService = cart[0];
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("booking.select-service") }}';

            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';

            const serviceInput = document.createElement('input');
            serviceInput.type = 'hidden';
            serviceInput.name = 'service_id';
            serviceInput.value = firstService.id;

            form.appendChild(csrfInput);
            form.appendChild(serviceInput);
            document.body.appendChild(form);
            form.submit();
        }

        document.addEventListener('DOMContentLoaded', function () {
            updateCartDisplay();
        });
    </script>
@endsection