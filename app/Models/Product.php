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
        "slug",
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

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function scopeMightLike($query, int $num = 4)
    {
        return $query->inRandomOrder()->take($num);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
    

    public function path()
    {
        return route('shop.show', $this->slug);
    }

    public static function featuredProducts(int $take = 6)
    {
        return static::inRandomOrder()
            ->featured()
            ->take($take)
            ->get();
    }
}
