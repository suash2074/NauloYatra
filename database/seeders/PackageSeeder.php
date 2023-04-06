<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $package_datas = [
            //packagse 1 data 
            [
                'user_id' => ,
                'trek_id' => ,
                'package_name' => '',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('packages')->insert($package_datas);

        $packageDetails_datas = [
            //package 1 Details 
            [
                'package_id' => ,
                'trek_type' => '',
                'days' => ,
                'price_per_person' => ,
                'details' => '',
                'link' => '',
                'category' => '',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('package_details')->insert($packageDetails_datas);
    }
}
