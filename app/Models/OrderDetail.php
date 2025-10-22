<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    function product(){
        return $this->belongsTo(Product::class);
    }
}
