<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['filename', 'path', 'mime_type', 'size', 'type'];

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }
}