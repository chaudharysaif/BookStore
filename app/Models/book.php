<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    //
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(userdetail::class);
    }

    public function carts()
    {
        return $this->belongsToMany(cart::class, 'book_carts')
            ->withPivot('cart_id', 'book_id')
            ->withTimestamps();
    }

    public function order_books()
    {
        return $this->hasMany(order_book::class);
    }
}
