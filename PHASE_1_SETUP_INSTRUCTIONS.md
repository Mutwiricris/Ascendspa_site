# Phase 1 Setup Instructions

## Overview
Phase 1 of the Ascend Spa booking system has been implemented with the following components:

✅ **Completed Components:**
- Database migrations for all core tables
- Laravel models with relationships
- AvailabilityService for time slot management
- Database seeders with comprehensive test data
- Booking and Availability controllers
- Web routes for booking system
- Form validation with BookingRequest
- MySQL database configuration

## 🔧 Setup Instructions

### 1. Environment Configuration

Create a `.env` file with the following MySQL database configuration:

```env
APP_NAME="Ascend Spa"
APP_ENV=local
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

# MySQL Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ascend_spa
DB_USERNAME=your_mysql_username
DB_PASSWORD=your_mysql_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

### 2. Database Setup

1. **Create MySQL Database:**
   ```sql
   CREATE DATABASE ascend_spa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

2. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

3. **Seed Database with Test Data:**
   ```bash
   php artisan db:seed
   ```

### 3. Generate Application Key

```bash
php artisan key:generate
```

### 4. Clear Config Cache

```bash
php artisan config:clear
php artisan cache:clear
```

## 📊 Database Structure

### Core Tables Created:
- `service_categories` - Hair Services, Spa & Massage, Facial Treatments, Nail Care, Barbershop
- `services` - 15 services across all categories with pricing and duration
- `branches` - 3 locations (Westlands, Karen, CBD) with working hours
- `staff` - 6 staff members with specialties and skills
- `staff_schedules` - 30 days of schedules for all staff
- `bookings` - Booking records with status tracking
- `branch_services` - Many-to-many relationship for service availability
- `branch_staff` - Staff assignments to branches
- `staff_services` - Staff service capabilities
- `payments` - Payment tracking and M-Pesa integration
- `users` - Enhanced with booking-specific fields

## 🎯 Time Slot Management

### AvailabilityService Features:
- **Smart Time Slot Generation:** 30-minute intervals with service duration consideration
- **Buffer Time Management:** Automatic cleanup time between appointments
- **Staff Availability:** Real-time staff schedule checking
- **Break Period Handling:** Lunch breaks and custom break periods
- **Booking Conflict Detection:** Prevents double bookings
- **Advance Booking Limits:** Respects service-specific booking windows
- **Minimum Notice Period:** 2-hour minimum booking notice

### Key Methods:
```php
// Get available time slots
$timeSlots = $availabilityService->getAvailableTimeSlots('2025-07-15', $serviceId, $branchId);

// Get available dates
$dates = $availabilityService->getAvailableDates($serviceId, $branchId, 30);

// Check specific time slot
$available = $availabilityService->isSpecificTimeSlotAvailable('2025-07-15', '14:30', $serviceId, $branchId);

// Reserve time slot
$booking = $availabilityService->reserveTimeSlot($bookingData);
```

## 🔗 Available Routes

### Web Routes:
- `GET /booking/create` - Booking wizard
- `GET /booking/{reference}` - Booking confirmation
- `GET /booking/{reference}/details` - Booking management
- `POST /booking/{reference}/cancel` - Cancel booking
- `POST /booking/{reference}/confirm` - Confirm booking

### API Routes for Livewire:
- `GET /api/availability/dates` - Available dates
- `GET /api/availability/timeslots` - Available time slots
- `GET /api/availability/staff` - Available staff
- `POST /api/availability/check-timeslot` - Validate time slot

## 🧪 Test Data

### Sample Services:
- **Hair Services:** Cut & Style (60min, KSh 2,500), Hair Coloring (120min, KSh 4,500)
- **Spa & Massage:** Swedish Massage (60min, KSh 3,500), Deep Tissue (75min, KSh 4,000)
- **Facial Treatments:** Classic Facial (45min, KSh 2,000), Anti-Aging (75min, KSh 3,500)
- **Nail Care:** Manicure (45min, KSh 1,500), Pedicure (60min, KSh 1,800)
- **Barbershop:** Men's Haircut (45min, KSh 1,800), Beard Trim (30min, KSh 1,200)

### Sample Branches:
- **Westlands:** Mon-Thu 9-6, Fri 9-8, Sat 8-7, Sun 10-5
- **Karen:** Mon-Thu 8:30-5:30, Fri 8:30-7, Sat 8-6, Sun 9:30-4:30
- **CBD:** Mon-Fri 8-6/7, Sat 9-5, Sun 10-4

### Sample Staff:
- 6 professional staff members with different specialties
- Realistic working schedules with break periods
- Varying experience levels and hourly rates

## 🔄 Next Steps for Phase 2

Ready to implement:
1. **Livewire Booking Components** - Interactive booking wizard
2. **Real-time Availability** - Dynamic time slot updates
3. **Mobile-First UI** - Responsive Tailwind CSS components
4. **Payment Integration** - M-Pesa STK Push implementation
5. **Email Notifications** - Booking confirmations and reminders

## 🛠️ Validation & Error Handling

The system includes comprehensive validation:
- **Real-time availability checking**
- **Kenyan phone number formatting**
- **Business hours validation**
- **Minimum booking notice enforcement**
- **Custom validation messages**
- **Account creation preferences**

## 📱 Ready for Integration

Phase 1 provides a solid foundation for:
- Livewire component integration
- Frontend development
- Payment gateway setup
- Email notification system
- Admin dashboard development

The time slot management system is production-ready and handles all edge cases for booking conflicts, staff availability, and business rules.