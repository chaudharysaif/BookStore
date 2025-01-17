<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->cart_id();
            $table->integer('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->integer('quantity');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('userdetails'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
