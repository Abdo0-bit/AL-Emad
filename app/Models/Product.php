<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'cost_price',
        'selling_price',
        'quantity',
        'unit',
        'category_id'
    ];


    public function products()
    {
        return $this->belongsTo(Category::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }

}
