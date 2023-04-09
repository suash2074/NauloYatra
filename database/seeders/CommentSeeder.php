<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'trek_id' => 1,
                'user_id' => 1,
                'text' => 'Be aware of illness',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'user_id' => 2,
                'text' => 'I love this trek',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 3,
                'user_id' => 3,
                'text' => 'Pardon me',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 4,
                'user_id' => 4,
                'text' => 'Greetings everyone.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 3,
                'user_id' => 1,
                'text' => 'Book the package',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'user_id' => 2,
                'text' => 'The route is genune though it really helped me.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'user_id' => 3,
                'text' => 'This content might not be totally correct !',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'user_id' => 4,
                'text' => 'I have travelled here once and the trial just falttered me really hard.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 3,
                'user_id' => 1,
                'text' => 'Lets goo !! Adventure is on..',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 4,
                'user_id' => 2,
                'text' => 'Tilicho lake marvelious fantastic',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 3,
                'user_id' => 3,
                'text' => 'This trek is wonderfull and best for mind, If you gyz want to travell tere book me !',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'user_id' => 4,
                'text' => 'This trek is really adventurous you guys must trek there once.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('comments')->insert($comment_datas);
    }
}
