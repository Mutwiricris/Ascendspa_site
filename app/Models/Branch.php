<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'working_hours',
        'timezone',
        'status'
    ];

    protected $casts = [
        'working_hours' => 'array'
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'branch_services')
                    ->withPivot('is_available', 'custom_price')
                    ->withTimestamps();
    }

    public function activeServices(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'branch_services')
                    ->withPivot('is_available', 'custom_price')
                    ->wherePivot('is_available', true)
                    ->where('services.status', 'active')
                    ->withTimestamps();
    }

    public function staff(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class, 'branch_staff')
                    ->withPivot('working_hours', 'is_primary_branch')
                    ->withTimestamps();
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}