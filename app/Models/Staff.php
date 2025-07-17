<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialties',
        'bio',
        'profile_image',
        'experience_years',
        'hourly_rate',
        'status'
    ];

    protected $casts = [
        'specialties' => 'array',
        'experience_years' => 'integer',
        'hourly_rate' => 'decimal:2'
    ];

    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, 'branch_staff')
                    ->withPivot('working_hours', 'is_primary_branch')
                    ->withTimestamps();
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'staff_services')
                    ->withPivot('proficiency_level')
                    ->withTimestamps();
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(StaffSchedule::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getFormattedExperienceAttribute()
    {
        return $this->experience_years . ' year' . ($this->experience_years !== 1 ? 's' : '') . ' experience';
    }
}