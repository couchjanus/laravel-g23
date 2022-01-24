<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'customer_name',
        'customer_email',
        'street',
        'city',
        'customer_phone',
        'postcode',
        'cus_card',
        'content'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

