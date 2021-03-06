<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brands";
    protected $fillable = ["name", "description", "slug","image"];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
}
