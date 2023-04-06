<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news_datas = [
            //News 1 
            [
                'user_id' => ,
                'headline' => '',
                'short_description' => '',
                'image' => '',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('news')->insert($news_datas);

        $newsDetails_datas = [
            //News 1 Details 
            [
                'news_id' => ,
                'sub_headline' => '',
                'description' => '',
                'image' => '',
                'link' => '',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('news_details')->insert($newsDetails_datas);
    }
}
