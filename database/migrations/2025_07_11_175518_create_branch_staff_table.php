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
        Schema::create('branch_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id');
            $table->foreign('branch_id', 'fk_branch_staff_branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreignId('staff_id');
            $table->foreign('staff_id', 'fk_branch_staff_staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->json('working_hours'); // weekly schedule
            $table->boolean('is_primary_branch')->default(false);
            $table->timestamps();
            
            $table->unique(['branch_id', 'staff_id']);
            $table->index('is_primary_branch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_staff');
    }
};