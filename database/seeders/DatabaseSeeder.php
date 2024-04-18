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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $data = [];
        $hexa = str_shuffle('0123456789ABCDEF');
        $randomColor = "#" . substr($hexa, 0, 6);

        for ($i = 0; $i <= 5; $i++) {
            $data[$i] = [
                'username' => 'user'.$i,
                'email' => 'user'.$i.'@gmail.com',
                'password' => Hash::make('123'),
                'name' => 'user'.$i,
                'phone' => '+62 ' . rand(100, 999) . '-' . rand(0000, 9999) . '-' . rand(00000, 99999),
                'address' => 'juuuuuuuuuuuh' . $i,
                'bg_color' => $randomColor,
                'email_verified_at' => now(),
                'status_verification' => 'accepted',
                'created_at' => now()
            ];
        }

        DB::table('users')->insert($data);
    }
}
