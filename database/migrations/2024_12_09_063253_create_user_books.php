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
        Schema::create('user_books', function (Blueprint $table) {
            
            $table->foreignId('userdetails_id')
                ->references('id')
                ->on('userdetails')
                ->casCadeOnDelete();
            
            $table->foreignId('book_id')
                ->references('id')
                ->on('books')
                ->casCadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_books');
    }
};
