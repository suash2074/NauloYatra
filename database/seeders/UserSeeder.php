<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_data = [
            // Admin
            [
                'first_name' => 'Suash',
                'last_name' => 'Rajbhandari',
                'username' => 'Swas',
                'address' => 'Pokhara',
                'phone' => 9827100545,
                'email' => 'suash.rb@gmail.com',
                'password' => Hash::make('suash123'),
                'role' => 'admin',
                'status' => 'Active'
            ],

            [
                'first_name' => 'Test',
                'last_name' => '1',
                'username' => 'Test1',
                'address' => 'Pokhara',
                'phone' => 9827100545,
                'email' => 'testuser@gmail.com',
                'password' => Hash::make('suash123'),
                'role' => 'user',
                'status' => 'Active'
            ],
        ];
        DB::table('users')->insert($user_data);

    }
}
