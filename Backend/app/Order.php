<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'apartman_id', 'name','hotel_name', 'date', 'days'
    ];
}
