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
        Schema::create('book_and_category', function (Blueprint $table) {
            $table->id();

            // Data diri
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('categeory_id');

            // 
            $table->foreign('book_id')->references('id')->on('books')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_and_category');
    }
};
