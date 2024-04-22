<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //=============================================================================================//
        $data = [];
        $hexa = str_shuffle('0123456789ABCDEF');
        $randomColor = "#" . substr($hexa, 0, 6);
        
        for ($i = 1; $i <= 5; $i++) {
            $data[$i] = [
                'username' => 'user'.$i,
                'email' => 'user'.$i.'@gmail.com',
                'password' => Hash::make('user123'),
                'name' => 'user'.$i,
                'phone' => '+62 ' . rand(100, 999) . '-' . rand(0000, 9999) . '-' . rand(00000, 99999),
                'address' => 'Jl andara no' . $i,
                'bg_color' => $randomColor,
                'coins' => 9999999,
                'email_verified_at' => now(),
                'status_verification' => 'accepted',
                'created_at' => now(),
            ];
        }
        
        DB::table('users')->insert($data);
        //=============================================================================================//
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'name' => 'Default Admin',
            'phone' => '+62 ' . rand(100, 999) . '-' . rand(0000, 9999) . '-' . rand(00000, 99999),
            'address' => 'Jl jauh belok kanan belok kiri lurus 30 meter',
            'coins' => 9_999_999,
            'bg_color' => $randomColor,
            'email_verified_at' => now(),
            'status_verification' => 'accepted',
            'role' => 'admin',
            'created_at' => now()
        ]);
        //=============================================================================================//
        for ($i = 1; $i <= 5; $i++) {
            $data[$i] = [
                'username' => 'officer'.$i,
                'email' => 'officer'.$i.'@gmail.com',
                'password' => Hash::make('officer123'),
                'name' => 'officer'.$i,
                'phone' => '+62 ' . rand(100, 999) . '-' . rand(0000, 9999) . '-' . rand(00000, 99999),
                'address' => 'Jl palembang no' . $i,
                'bg_color' => $randomColor,
                'coins' => 9999999,
                'email_verified_at' => now(),
                'status_verification' => 'accepted',
                'role' => 'officer',
                'created_at' => now(),
            ];
        }
        
        DB::table('users')->insert($data);
        //=============================================================================================//
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[$i] = [
                'name' => 'category'.$i,
                'created_at' => now(),
            ];
        }
        
        DB::table('categories')->insert($data);
        //=============================================================================================// 
    }
}
