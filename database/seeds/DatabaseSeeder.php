<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'username' => 'adminSuper',
            'full_name' => 'adminSuper',
            'phone' => '+62 0896-1231-4353',
            'address' => 'Jl lama',
            'profile' => 'profile',
            'created_at' => now()
        ]);
    }
}
