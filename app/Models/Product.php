<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Carts(){
        return $this->hasMany(Cart::class, 'product_id');
    }

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImage(){
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

}
