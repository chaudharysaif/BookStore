<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdetail extends Model
{
    //
    use HasFactory;

    function carts()
    {
        return $this->hasMany(cart::class,'userdetail_id');
    }

    public function books()
    {
        return $this->hasMany(book::class , 'id');
    }

    public function order_books()
    {
        return $this->hasMany(order_book::class);
    }
}
