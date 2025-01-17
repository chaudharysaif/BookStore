<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    use HasFactory;

    public function userdetails()
    {
        return $this->belongsTo(userdetail::class);
    }

    public function books()
    {
        return $this->belongsToMany(book::class, 'book_carts')
            ->withPivot('cart_id', 'book_id')
            ->withTimestamps();
    }
}
