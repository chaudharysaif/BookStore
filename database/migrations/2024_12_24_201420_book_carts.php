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
        //
        Schema::create('book_carts', function (Blueprint $table) {

            $table->id();
            $table->foreignId('cart_id')
                ->references('id')
                ->on('carts')
                ->casCadeOnDelete();

            $table->foreignId('book_id')
                ->references('id')
                ->on('books')
                ->casCadeOnDelete();
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('book_carts');
    }
};
