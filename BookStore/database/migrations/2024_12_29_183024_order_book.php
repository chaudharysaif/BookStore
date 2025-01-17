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
        Schema::create('order_books', function (Blueprint $table) {

            $table->id();
            $table->integer('userdetail_id');
            $table->foreign('userdetail_id')->references('id')->on('userdetails');
            $table->integer('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->integer('quantity');
            $table->integer('order_no');
            $table->string('order_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
