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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Untuk Verifikasi
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            // Untuk Verifikasi

            // Data diri
            $table->string('name');
            $table->unsignedInteger('age')->default(14);
            $table->string('phone');
            $table->text('address');
            // Data diri

            // Mata uang Hanif Liibrary
            $table->integer('unpaid')->default(0);
            $table->unsignedInteger('coins')->default(0);
            // Mata uang Hanif Liibrary

            // picture
            $table->string('picture')->nullable();
            $table->string('bg_color')->nullable();
            // picture

            // Hak izin
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status_verification', ['already', 'accepted', 'failed'])->default('already');
            $table->date('email_expired')->nullable();
            $table->enum('role', ['admin', 'courier', 'officer', 'librarian'])->default('librarian');
            $table->softDeletes();
            // Hak izin

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
