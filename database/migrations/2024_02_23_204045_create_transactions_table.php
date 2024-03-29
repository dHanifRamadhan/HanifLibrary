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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // Data diri
            $table->unsignedBigInteger('user_id');
            $table->date('transaction_date');
            $table->unsignedInteger('total_qty');
            $table->bigInteger('total_amount');

            $table->date('package_arrived');
            $table->enum('status', ['send', 'arrived', 'received'])->default('send');
            $table->string('picture')->nullable();

            // Relasi
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
