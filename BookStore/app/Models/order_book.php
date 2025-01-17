<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_book extends Model
{
    //
    function books()
    {
        return $this->belongsTo(book::class, 'book_id');
    }

    public function users()
    {
        return $this->belongsTo(userdetail::class);
    }
}
