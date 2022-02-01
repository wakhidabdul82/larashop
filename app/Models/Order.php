<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'invoice',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'city',
        'state',
        'postcode',
        'additional',
        'total_payment',
        'tracking_number',
        'status'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
