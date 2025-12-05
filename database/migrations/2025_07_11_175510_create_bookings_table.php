<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_reference', 20)->unique();
            $table->foreignId('branch_id');
            $table->foreign('branch_id', 'fk_bookings_branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreignId('service_id');
            $table->foreign('service_id', 'fk_bookings_service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreignId('client_id');
            $table->foreign('client_id', 'fk_bookings_client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('staff_id')->nullable();
            $table->foreign('staff_id', 'fk_bookings_staff_id')->references('id')->on('staff')->onDelete('set null');
            $table->date('appointment_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled', 'no_show'])->default('pending');
            $table->text('notes')->nullable();
            $table->decimal('total_amount', 8, 2);
            $table->enum('payment_status', ['pending', 'paid', 'partial', 'refunded'])->default('pending');
            $table->enum('payment_method', ['cash', 'mpesa', 'card'])->default('cash');
            $table->string('mpesa_transaction_id', 50)->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
            
            // Indexes for performance
            $table->index('booking_reference');
            $table->index(['branch_id', 'appointment_date']);
            $table->index(['staff_id', 'appointment_date']);
            $table->index(['client_id', 'status']);
            $table->index(['appointment_date', 'start_time']);
            $table->index('status');
            $table->index('payment_status');
            
            // Unique constraint to prevent double booking
            $table->unique(['staff_id', 'appointment_date', 'start_time'], 'unique_staff_appointment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
