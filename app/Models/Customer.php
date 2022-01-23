<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table ='customers';
    protected $fillable = ['first_name',
                            'last_name', 'email', 'phone_number', 'address', 'user_id', 'birthday', 'image'
                        ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
        }
}
