<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    function orderdetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
