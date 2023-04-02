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
                'password' => Hash::make('@suash2074'),
                'role' => 'admin',
                'photo' => {{assets('uploads/')}}
                'cost_per_day' => null,
                'availability' => null,
                'status' => 'Active'
            ],

            [
                'first_name' => 'Kapil',
                'last_name' => 'Tiwari',
                'username' => 'Kaps',
                'address' => 'Pokhara',
                'phone' => 9827100545,
                'email' => 'kapil@gmail.com',
                'password' => Hash::make('@kapil2074'),
                'role' => 'user',
                'cost_per_day' => null,
                'availability' => null,
                'status' => 'Active'
            ],

            [
                'first_name' => 'Nitesh',
                'last_name' => 'Bhandari',
                'username' => 'Knetex',
                'address' => 'Syangja',
                'phone' => 9827100545,
                'email' => 'knetex.bhandari@gmail.com',
                'password' => Hash::make('@nitesh2074'),
                'role' => 'guide',
                'cost_per_day' => 1500,
                'availability' => 'Available',
                'status' => 'Active'
            ],

            [
                'first_name' => 'Aastha',
                'last_name' => 'Udas',
                'username' => 'Aasu',
                'address' => 'Pokhara',
                'phone' => 9827100545,
                'email' => 'aastha.udas@gmail.com',
                'password' => Hash::make('@aastha2074'),
                'role' => 'guide',
                'cost_per_day' => 1600,
                'availability' => 'Available',

                'status' => 'Active'
            ],
        ];
        DB::table('users')->insert($user_data);

    }
}
