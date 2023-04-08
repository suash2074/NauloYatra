<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'user_id' => 1,
                'headline' => 'Are you Willing to take a risk!',
                'short_description' => 'Shey Phoksundo is a remote and stunning trek in western Nepal, known for its crystal-clear lake, high-altitude passes, and unique Bon Buddhist culture.',
                'image' => 'News-2023040704272287.jpg',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            //News 2
            [
                'user_id' => 3,
                'headline' => 'Top place to visit this summer',
                'short_description' => 'If you are looking for an adventure this summer, do not miss the chance to explore the pristine beauty of Rara Lake or the mesmerizing turquoise waters of Tilicho Lake. These natural wonders offer a once-in-a-lifetime experience that will leave you spellbound and rejuvenated.',
                'image' => 'News-202304080843458.jpg',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            //News 3
            [
                'user_id' => 4,
                'headline' => 'Rara Lake one of the most favriouble palce of trekkers',
                'short_description' => 'Rara Lake, the largest lake in Nepal, is a hidden gem nestled amidst the pristine Himalayas, surrounded by lush green forests and snow-capped mountains. The crystal clear waters of the lake, home to numerous species of fish, offer a serene and picturesque view that leaves visitors mesmerized.',
                'image' => 'News-2023040809120713.webp',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('news')->insert($news_datas);

        $newsDetails_datas = [
            //News 1 Details 
            [
                'news_id' => 1,
                'sub_headline' => 'Then uou must travell Shey poksundo lake once in your life',
                'description' => 'The beauty and grandeur of Shey Phoksundo Lake is something that words cannot do justice to. It is a must-visit destination for anyone seeking adventure and natural beauty. With its crystal-clear blue waters, surrounded by towering mountains and a unique ecosystem of flora and fauna, this lake is truly a sight to behold. Visiting Shey Phoksundo Lake is a once-in-a-lifetime experience that you simply cannot miss!',
                'image' => 'News_detail-2023040808345933.webp',
                'link' => 'http://localhost/NauloYatra/public/user/content2',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'news_id' => 2,
                'sub_headline' => 'About Rara lake',
                'description' => 'Nestled in the midst of the pristine Himalayas, Rara Lake is a hidden gem thats waiting to be explored. With crystal-clear turquoise waters that reflect the snow-capped peaks of the surrounding mountains, its no wonder that Rara is known as the "Queen of Lakes" in Nepal. Trekking to this stunning lake is an adventure that will take you through lush forests, charming traditional villages, and rugged mountain passes, all while being surrounded by breathtaking natural beauty. Whether youre an experienced trekker or a first-time adventurer, Rara Lake is a must-visit destination that will leave you spellbound.',
                'image' => 'News_detail-2023040808565549.webp',
                'link' => 'http://localhost/NauloYatra/public/user/content3',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'news_id' => 2,
                'sub_headline' => 'About Tilicho Lake',
                'description' => 'Located at an altitude of 4,919 meters in the Annapurna range, Tilicho Lake is a stunning turquoise blue lake that will take your breath away. Surrounded by towering snow-capped peaks, the lake is a natural wonder that offers an unforgettable trekking experience for adventure seekers and nature lovers alike. A visit to this high-altitude lake is a must for those seeking an off-the-beaten-path adventure and a glimpse of the stunning beauty of the Himalayas.',
                'image' => 'News_detail-202304080854352.gif',
                'link' => 'http://localhost/NauloYatra/public/user/content4',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'news_id' => 3,
                'sub_headline' => 'Why most people like to travel Rara lake ?',
                'description' => 'Most people like to trek to Rara Lake because of its pristine natural beauty, crystal clear water, and the serene surroundings of the lake. The trek is also relatively less crowded compared to other popular treks in Nepal, making it perfect for those seeking a peaceful and undisturbed trekking experience. Additionally, the trek offers an opportunity to witness the unique culture and lifestyle of the people living in the remote region of western Nepal. Thats why Rara Lake should be on every travelers bucket list. So pack your bags and get ready for an unforgettable adventure amidst the unspoiled natural beauty of Rara Lake. Trust us, you wont regret it!',
                'image' => 'News_detail-2023040808565549.webp',
                'link' => 'http://localhost/NauloYatra/public/user/content3',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('news_details')->insert($newsDetails_datas);
    }
}
