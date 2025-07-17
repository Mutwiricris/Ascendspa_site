<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\AvailabilityController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Service Pages
Route::view('services/hair', 'pages.Services.hair')->name('services.hair');
Route::view('services/nails', 'pages.Services.nails')->name('services.nails');
Route::view('services/spa', 'pages.Services.spa')->name('services.spa');
Route::view('services/massage', 'pages.Services.massage')->name('services.massage');
Route::view('services/facials', 'pages.Services.facials')->name('services.facials');
Route::view('services/barbershop', 'pages.Services.barbershop')->name('services.barbershop');
Route::view('services', 'pages.Services.Services')->name('services');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

// Booking Routes
Route::prefix('booking')->name('booking.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('branches', [BookingController::class, 'branches'])->name('branches');
    Route::post('select-branch', [BookingController::class, 'selectBranch'])->name('select-branch');
    
    Route::get('services', [BookingController::class, 'services'])->name('services');
    Route::post('select-service', [BookingController::class, 'selectService'])->name('select-service');
    
    Route::get('staff', [BookingController::class, 'staff'])->name('staff');
    Route::post('select-staff', [BookingController::class, 'selectStaff'])->name('select-staff');
    
    Route::get('datetime', [BookingController::class, 'datetime'])->name('datetime');
    Route::get('timeslots', [BookingController::class, 'getTimeSlots'])->name('get-timeslots');
    Route::post('select-datetime', [BookingController::class, 'selectDateTime'])->name('select-datetime');
    
    Route::get('client-info', [BookingController::class, 'clientInfo'])->name('client-info');
    Route::post('save-client-info', [BookingController::class, 'saveClientInfo'])->name('save-client-info');
    
    Route::get('payment', [BookingController::class, 'payment'])->name('payment');
    Route::post('confirm', [BookingController::class, 'confirmBooking'])->name('confirm');
    
    Route::get('confirmation/{reference}', [BookingController::class, 'confirmation'])->name('confirmation');
    Route::post('go-back', [BookingController::class, 'goBack'])->name('go-back');
});

// Availability API endpoints for Livewire components
Route::prefix('api/availability')->name('api.availability.')->group(function () {
    Route::get('dates', [AvailabilityController::class, 'getDates'])->name('dates');
    Route::get('timeslots', [AvailabilityController::class, 'getTimeSlots'])->name('timeslots');
    Route::get('staff', [AvailabilityController::class, 'getStaff'])->name('staff');
    Route::post('check-timeslot', [AvailabilityController::class, 'checkTimeSlot'])->name('check-timeslot');
});

// Facilities Pages
Route::view('facilities', 'pages.facilities.facilities')->name('facilities');
Route::view('facilities/details', 'pages.facilities.facilitiesDetails')->name('facilities.details');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'restrict.user'])
    ->name('dashboard');

Route::middleware(['auth', 'restrict.user'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
