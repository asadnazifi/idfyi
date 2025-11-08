<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'type', 'related_plan_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function plan()
    {
        return $this->belongsTo(SupportPlan::class, 'related_plan_id');
    }
    public function messages()
    {
        return $this->hasMany(SupportMessage::class);
    }
}
