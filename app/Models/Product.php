<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "title",
        "description",
        "sku",
        "color",
        "size",
        "category_id",
        "brand_id",
        "stock",
        "regular_price",
        "promo_price",
        "image"
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
