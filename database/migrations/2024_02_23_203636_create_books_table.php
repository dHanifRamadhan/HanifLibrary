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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('author');
            $table->string('publisher');
            $table->date('year_published');
            $table->integer('qty')->unsigned()->default(0);
            $table->bigInteger('price')->unsigned();
            $table->enum('status', ['available','unavailable'])->default('available');

            // Coloring Picture
            $table->string('cover_bottom_color')->default('#1E293B');
            $table->string('cover_right_color')->default('#475569');
            $table->string('cover_color')->default('#64748B');
            $table->string('picture');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
