<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'first_name',
        'last_name', 
        'phone',
        'date_of_birth',
        'gender',
        'allergies',
        'preferences',
        'marketing_consent',
        'create_account_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
            'preferences' => 'array',
            'marketing_consent' => 'boolean',
        ];
    }

    /**
     * Get the user's bookings
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'client_id');
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * Get full name
     */
    public function getFullNameAttribute(): string
    {
        return trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? '')) ?: $this->name;
    }

    /**
     * Get formatted phone number
     */
    public function getFormattedPhoneAttribute(): string
    {
        if (!$this->phone) return '';
        
        $phone = preg_replace('/\D/', '', $this->phone);
        
        if (str_starts_with($phone, '254')) {
            return '+254 ' . substr($phone, 3, 3) . ' ' . substr($phone, 6, 3) . ' ' . substr($phone, 9, 3);
        } elseif (str_starts_with($phone, '0') && strlen($phone) === 10) {
            return substr($phone, 0, 4) . ' ' . substr($phone, 4, 3) . ' ' . substr($phone, 7, 3);
        }
        
        return $this->phone;
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->user_type === 'admin';
    }

    /**
     * Check if user is staff
     */
    public function isStaff(): bool
    {
        return $this->user_type === 'staff';
    }

    /**
     * Check if user is regular user
     */
    public function isUser(): bool
    {
        return $this->user_type === 'user';
    }

    /**
     * Check if user can login to admin area
     */
    public function canAccessAdmin(): bool
    {
        return in_array($this->user_type, ['admin', 'staff']);
    }

    /**
     * Scope to get only users who can login
     */
    public function scopeCanLogin($query)
    {
        return $query->whereIn('user_type', ['admin', 'staff']);
    }

    /**
     * Scope to get only regular users (booking customers)
     */
    public function scopeCustomers($query)
    {
        return $query->where('user_type', 'user');
    }
}
