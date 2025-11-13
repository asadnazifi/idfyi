<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Morilog\Jalali\Jalalian;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'lastname',
        'farstname',
        'email',
        'phone',
        'password',
        'role',
        'balance',
        'status',
        'photo',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
    ];

    // بررسی نقش
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isDeveloper(): bool
    {
        return $this->role === 'developer';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    // مسیر کامل عکس پروفایل (فایل داخل storage یا public)
    public function getPhotoUrlAttribute()
    {
        return $this->photo
            ? asset('storage/' . $this->photo)
            : asset('images/default-avatar.png');
    }
    public function getJalaliCreatedAtAttribute()
    {
        return Jalalian::forge($this->created_at)->format('H:i- Y/m/d');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'notification_users')
            ->withPivot('is_read', 'read_at')
            ->withTimestamps();
    }
}
