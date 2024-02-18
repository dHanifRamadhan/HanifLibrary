<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('author');
            $table->string('publisher');
            $table->date('year_published');
            $table->integer('qty')->unsigned()->default(0);
            $table->enum('status', ['available','unavailable'])->default('available');
            // Coloring
            $table->string('cover_bottom_color')->default('#1E293B');
            $table->string('cover_right_color')->default('#475569');
            $table->string('cover')->default('#64748B');
            $table->string('picture');
            // Penanggalan
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
