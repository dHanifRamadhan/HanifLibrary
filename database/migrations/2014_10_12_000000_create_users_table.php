<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Main Field
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('status_email')->default(0);
            $table->string('password');
            $table->enum('role', ['admin', 'officer', 'librarian'])->default('librarian');
            // Side Field
            $table->string('username')->unique();
            $table->string('full_name');
            $table->string('phone')->unique();
            $table->text('address');
            $table->bigInteger('unpaid')->default(0);
            $table->string('profile')->default("image/default/profile.jpeg");
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
        Schema::dropIfExists('users');
    }
}
