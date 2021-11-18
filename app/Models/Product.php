<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function discount(){
        return $this->belongsTo(Discount::class);
    }


    public function carts(){
        return $this->hasMany(Cart::class);
    }


    public function reviews(){
        return $this->hasMany(Review::class);
    }

    
}

