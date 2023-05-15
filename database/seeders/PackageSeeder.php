<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'user_id' => 3,
                'trek_id' => 1,
                'package_name' => '15 Days 14 Nights trek to Annapurna Circuit Trek',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'user_id' => 4,
                'trek_id' => 2,
                'package_name' => '12 Days 11 Night trek Shey Poksundo Trek',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            // [
            //     'user_id' => 4,
            //     'trek_id' => 3,
            //     'package_name' => '',
            //     'created_at' => Carbon::now(),
            //     'status' => 'Active'
            // ],

            // [
            //     'user_id' => 4,
            //     'trek_id' => 4,
            //     'package_name' => '',
            //     'created_at' => Carbon::now(),
            //     'status' => 'Active'
            // ],

            // [
            //     'user_id' => 3,
            //     'trek_id' => 1,
            //     'package_name' => '15 Days 14 Nights to Annapurna Circuit Trek',
            //     'created_at' => Carbon::now(),
            //     'status' => 'Active'
            // ],
        ];
        DB::table('packages')->insert($package_datas);

        $packageDetails_datas = [
            //package 1 Details 
            [
                'package_id' => 1,
                'trek_type' => 'Gap Trek',
                'days' => 15,
                'price_per_person' => 40000,
                'details' => '15-day Annapurna Circuit Trek<br><br>
                <b>Day 01</b> - Drive to Besisahar (923m) and trekking to Bulbule.<br><br>
                <b>Day 02</b> - Trek to Chamje (1410m)<br><br>
                <b>Day 03</b> - Trek to Bagarchhap (2160m)<br><br>
                <b>Day 04</b> - Trek to Chame (2710m)<br><br>
                <b>Day 05</b> - Trek to Pisang (3240m)<br><br>
                <b>Day 06</b> - Trek to Manang (3540m)<br><br>
                <b>Day 07</b> - Acclimatisation in Manang<br><br>
                <b>Day 08</b> - Trek to Yak Kharka (4120m)<br><br>
                <b>Day 09</b> - Trek to Thorung Phedi (4.560m)<br><br>
                <b>Day 10</b> - Over Thorung La (5.416m) to Muktinath (3.802m) - 8 hours<br><br>
                <b>Day 11</b> - Trek to Jomsom (2750m) via Kagbeni.<br><br>
                <b>Day 12</b> - Drive to Tatopani (1190) - Hot Water Springs<br><br>
                <b>Day 13</b> - Trek to Ghorepani (2750m)<br><br>
                <b>Day 14</b> - Ghorepani - Poonhill - Nayapul. Drive to Pokhara - 7 hours<br><br>
                <b>Day 15</b> - Return drive to Kathmandu and transfer to hotel - 7 <br><br>
                &) What stuffs will be provided<br><br>
                <b>1.</b> 1 Guide<br>
                <b>2.</b> 1 Porter<br>
                <b>3.</b> Sleeping bags for each person<br>
                <b>4.</b> Pillow for each person<br>
                <b>5.</b> Tent<br>
                <b>6.</b> Hiking sticks for each person<br>
                <b>7.</b> Foods',
                'link' => 'http://localhost/NauloYatra/public/user/content1',
                'category' => 'Standard',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            //package 2 Details 
            [
                'package_id' => 2,
                'trek_type' => 'Tea House Trek',
                'days' => 12,
                'price_per_person' => 25000,
                'details' => '12 day Shey Poksundo Trek<br><br>
                <b>Day 1 </b>Drive to Nepalgunj from Damauli.<br><br>
                <b>Day 2 </b>Nepalgunj – Khadang(Jajarkot) – Rinma (Drive)<br><br>
                <b>Day 3 </b>Rinma – Rari – Tallubagar – Mulbazar – Mulbazar – Lamachaur – Karapgaad – Khadang (Drive, Need to change jeeps on each stop)<br><br>
                <b>Day 4 </b>Khadang – Tripurakot – Suligaad (Drive)<br><br>
                <b>Day 5 </b>Suligad – Kageni (Drive/trek)<br><br>
                <b>Day 6 </b>Kageni – Chhepka – Reji (trek)<br><br>
                <b>Day 7 </b>Reji – Jharana Hotel – Phoksundo (Ringmo village 3460m)(Trek)<br><br>
                <b>Day 8 </b>Explore around Phoksundo lake and viewpoint (4100m)<br><br>
                <b>Day 9 </b>Ringmo – Kageni (trek)<br><br>
                <b>Day 10</b> Kageni – suligad – Juphal Airport (trek/drive)<br><br>
                <b>Day 11</b> Juphal – Nepalgunj (flight).<br><br>
                <b>Day 12</b> Nepalgunj – Kathmandu Drive (Drive/flight)<br><br>
                &)What stuffs will be provided<br><br>
                <b>1.</b> All necessery stuffs should be carried by yourself.<br>
                <b>Note:</b> <u>Flight cost is not included</u>',
                'link' => 'http://localhost/NauloYatra/public/user/content2',
                'category' => 'Standard',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],


            //package 3 Details 
            [
                'package_id' => 1,
                'trek_type' => 'Gap Trek',
                'days' => 15,
                'price_per_person' => 28000,
                'details' => '15-day Annapurna Circuit Trek<br><br>
                <b>Day 01</b> - Drive to Besisahar (923m) and trekking to Bulbule.<br><br>
                <b>Day 02</b> - Trek to Chamje (1410m)<br><br>
                <b>Day 03</b> - Trek to Bagarchhap (2160m)<br><br>
                <b>Day 04</b> - Trek to Chame (2710m)<br><br>
                <b>Day 05</b> - Trek to Pisang (3240m)<br><br>
                <b>Day 06</b> - Trek to Manang (3540m)<br><br>
                <b>Day 07</b> - Acclimatisation in Manang<br><br>
                <b>Day 08</b> - Trek to Yak Kharka (4120m)<br><br>
                <b>Day 09</b> - Trek to Thorung Phedi (4.560m)<br><br>
                <b>Day 10</b> - Over Thorung La (5.416m) to Muktinath (3.802m) - 8 hours<br><br>
                <b>Day 11</b> - Trek to Jomsom (2750m) via Kagbeni.<br><br>
                <b>Day 12</b> - Drive to Tatopani (1190) - Hot Water Springs<br><br>
                <b>Day 13</b> - Trek to Ghorepani (2750m)<br><br>
                <b>Day 14</b> - Ghorepani - Poonhill - Nayapul. Drive to Pokhara - 7 hours<br><br>
                <b>Day 15</b> - Return drive to Kathmandu and transfer to hotel - 7 <br><br>
                &)What stuffs will be provided<br><br>
                <b>1.</b> 1 Guide<br>
                <b>2.</b> 1 Porter<br>
                <b>3.</b> Other necessery stuffs should be carried by yourself.',
                'link' => 'http://localhost/NauloYatra/public/user/content1',
                'category' => 'Basic',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('package_details')->insert($packageDetails_datas);
    }
}
