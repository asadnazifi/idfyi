<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'type',
        'description',
        'price',
        'sale_price',
        'stock',
        'thumbnail',
        'is_active',
        'short_content'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function files()
    {
        return $this->hasMany(ProductFile::class);
    }

    public function metas()
    {
        return $this->hasMany(ProductMeta::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            $product->slug = Str::slug($product->title);
        });
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 0);
    }
}
