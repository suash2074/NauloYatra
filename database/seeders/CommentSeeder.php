<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment_datas = [
            //Comment 1 on Trek Meme
            [
                'trek_id' => ,
                'user_id' => ,
                'text' => '',
                'trek_type' => '',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('comments')->insert($comment_datas);
    }
}
