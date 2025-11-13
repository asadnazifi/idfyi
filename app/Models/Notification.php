<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'message',
        'link',
    ];

    /**
     * اعلان ممکن است مختص یک کاربر باشد (تکی)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * کاربران دریافت‌کننده (در اعلان‌های عمومی یا تکی)
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'notification_users')
            ->withPivot('is_read', 'read_at')
            ->withTimestamps();
    }
    public function getJalaliCreatedAtAttribute()
    {
        return Jalalian::forge($this->created_at)->format('H:i- Y/m/d');
    }
}
