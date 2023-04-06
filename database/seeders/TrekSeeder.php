<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trek_datas = [
            //Trek 1 data (Annapurna Circuit Trek)
            [
                'trek_name' => 'Annapurna Circuit Trek',
                'user_id' => 1,
                'background_image' => 'Trek-2023040201382157.jpg',
                'trek_type' => 'Gap-Trek',
                'duration' => 15,
                'track_difficulty' => 'Difficult',
                'average_budget' => 20000,
                'best_season' => 'Spring',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            //Trek 2 data (Shey Phoksundo Trek)
            [
                'trek_name' => 'Shey Phoksundo Trek',
                'user_id' => 3,
                'background_image' => 'Trek-2023040408090337.webp',
                'trek_type' => 'Tea-House-Trek',
                'duration' => 14,
                'track_difficulty' => 'Moderate',
                'average_budget' => 22000,
                'best_season' => 'Autumn',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

        ];
        DB::table('treks')->insert($trek_datas);

        $aboutTrek_datas = [
            //Trek 1 (Annapurna Circuit Trek) About data

            [
                'trek_id' => 1,
                'title' => 'About Annapurna Circuit Trek',
                'description' => 'The Annapurna Circuit Trek is a trekking route in Nepal that takes trekkers on a journey around the Annapurna Massif. The trek is known for its varied landscapes, cultural diversity, and stunning views of the Himalayas.

                The trek begins in the town of Besishahar, where trekkers can hire a jeep or take a local bus to the starting point of the trek. The route then gradually ascends through traditional Gurung and Manangi villages, passing through lush forests and rocky terrain. The trek provides plenty of opportunities to witness the rich culture and traditions of the Annapurna region, including ancient monasteries, festivals, and traditional cuisine.
                
                One of the highlights of the trek is reaching Thorong La Pass, which is the highest point on the trek and stands at 5,416 meters (17,769 ft) above sea level. This is a challenging part of the trek and requires proper acclimatization to the altitude, so trekkers are advised to take their time and rest as needed.
                
                Accommodation on the trek is provided at tea houses or lodges along the route, which offer basic but comfortable amenities such as beds, hot showers, and meals. Trekkers are advised to carry enough cash to cover their expenses, as ATMs are not available along the trek.
                
                The Annapurna Circuit Trek is a challenging trek that requires physical fitness and endurance, but the stunning views and cultural experiences make it a highly rewarding experience. It is recommended to trek during the peak seasons of spring (March-May) and autumn (September-November) when the weather is favorable, and the views are clearer. Trekking with a licensed guide is also highly recommended for safety and a more enjoyable experience.',
                'image' => 'About_section-2023040202225068.jpg',
                'note' => 'The Annapurna Circuit Trek is a moderate to difficult trek that offers a unique cultural experience and stunning views of the Himalayas. Accommodation is provided at tea houses or lodges, and trekking with a licensed guide is recommended for safety and a more enjoyable experience.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'title' => 'Which season is best to visit Annapurna Circuit Trek ?',
                'description' => 'The best season to visit the Annapurna Circuit Trek is generally during the Autumn season (September to November) and Spring season (March to May). During these months, the weather is generally clear, dry, and stable, providing the best visibility and a comfortable temperature for trekking.

                During Autumn, the skies are usually clear, and the views of the surrounding mountains are spectacular. The temperature during the day is moderate and comfortable, while the evenings can be chilly. Spring is also a great time to visit as the weather is mild, and the trail is covered with blooming flowers and lush vegetation.
                
                However, its important to note that weather can be unpredictable in the mountains, so its always best to check the latest weather forecast and consult with local experts before embarking on a trek.',
                'image' => 'About_section-2023040202273145.jpg',
                'note' => 'The best seasons to visit the Annapurna Circuit Trek are spring (March-May) and autumn (September-November) when the weather is favorable, and the views are clearer.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            //Trek 1 (Shey Phoksundo Trek) About data
            [
                'trek_id' => 2,
                'title' => 'About Shey Phoksundo Trek',
                'description' => 'The Shey Phoksundo Trek is a stunning trek that takes you through some of the most beautiful and remote areas of Nepal. The trail passes through the Shey Phoksundo National Park, which is located in the remote Dolpo region of western Nepal. The trek begins in the small town of Juphal, which is accessible by a short flight from any national airport, and takes around 2-3 weeks to complete.

                The trail passes through a variety of landscapes, from lush forests and grasslands to arid high-altitude regions. Trekkers will experience the beauty of the Himalayas up close, including stunning views of snow-capped peaks such as Kanjiroba, Dhaulagiri, and Annapurna.
                
                One of the highlights of the trek is the stunning Shey Phoksundo Lake, which is one of the deepest lakes in Nepal and is famous for its crystal-clear blue waters. The lake is surrounded by towering mountains and is home to a unique ecosystem of flora and fauna, including snow leopards, musk deer, and blue sheep.
                
                The trek also passes through several traditional villages, including Ringmo, which is a picturesque village located on the shores of Shey Phoksundo Lake. The village is home to the Bon Buddhist community, which practices a unique form of Buddhism that predates Tibetan Buddhism. Trekkers will have the opportunity to experience the traditional way of life of the local people who inhabit this remote area.
                
                One of the challenges of the trek is the high altitude, with several passes reaching over 5,000 meters. It is important to properly acclimatize and be prepared for the effects of altitude, including potential altitude sickness. Trekking permits are required to enter the Shey Phoksundo National Park, and it is advisable to hire a guide or join a trekking group to ensure safety and proper navigation of the trail. Overall, the Shey Phoksundo Trek is a challenging but rewarding trek that offers an unforgettable adventure through some of the most stunning and remote areas of Nepal.',
                'image' => 'About_section-2023040408431591.jpg',
                'note' => 'The Shey Phoksundo Trek is a remote and challenging trek located in the Dolpo region of Nepal. It offers stunning views of the Himalayas, passes through diverse landscapes, and provides insight into the unique culture and lifestyle of the local ethnic groups.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'title' => 'Which season is best to visit Shey Phoksundo Trek ?',
                'description' => 'The best season to visit Shey Phoksundo Trek is from September to November, which is the autumn season in Nepal. The weather during this time is dry and clear, providing spectacular views of the mountains and the Phoksundo Lake. The temperature is also moderate, making it comfortable for trekking. The spring season from March to May is also a good time to visit, with the added bonus of blooming rhododendrons and other wildflowers. However, the weather during this season can be more unpredictable with occasional rain showers.',
                'image' => 'About_section-2023040408444237.webp',
                'note' => 'Best season to visit Shey Phoksundo Trek is from September to November or from March to May, with moderate temperatures and clear weather.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            // [
            //     'trek_id' => 1,
            //     'title' => '',
            //     'description' => '',
            //     'image' => '',
            //     'note' => '',
            //     'created_at' => Carbon::now(),
            //     'status' => 'Active'
            // ],
        ];
        DB::table('about_sections')->insert($aboutTrek_datas);

        $cultureTrek_datas = [
            //Trek 1 (Annapurna Circuit Trek) culture data

            [
                'trek_id' => 1,
                'title' => 'Culture',
                'description' => 'The Annapurna Circuit Trek offers a unique cultural experience as trekkers get to interact with people from different ethnic communities along the way and witness traditional festivals and ceremonies.

                One of the most famous festivals celebrated in the Annapurna region is the Manang Festival, which usually takes place in February or March. During the festival, locals dress up in traditional costumes and perform dances, songs, and music to honor their deities and ancestors. The festival is a great opportunity to witness the traditional culture and customs of the Manangi people.
                
                Another festival that trekkers may encounter is the Teej festival, which is celebrated by women in August or September. The festival is a celebration of the monsoon season and is marked by fasting, feasting, and dancing. Trekkers may witness groups of women dressed in red saris and dancing to traditional music as part of the festival.
                
                The Annapurna Circuit Trek also offers a chance to visit ancient monasteries and temples, including the Muktinath temple, which is sacred to both Hindus and Buddhists. The temple is located at an altitude of 3,710 meters and is believed to have healing powers.
                
                Overall, the Annapurna Circuit Trek provides an opportunity to immerse oneself in the traditional cultures and customs of the Annapurna region, making for a truly enriching experience.',
                'image' => 'Culture-2023040202374469.jpg',
                'note' => null,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'title' => 'Culture',
                'description' => 'The Dolpo region, where the Shey Phoksundo Trek is located, is home to several unique ethnic groups, including the Dolpo-pa, who have preserved their traditional culture and lifestyle for centuries. Trekkers will have the opportunity to witness their traditional dances, costumes, and rituals during various festivals and events such as the annual Phoksundo Festival held in August, which celebrates the regions natural beauty, culture, and heritage. The Bon Buddhist community, which practices a unique form of Buddhism that predates Tibetan Buddhism, is also a significant part of the culture in the region and can be experienced during the trek.',
                'image' => 'Culture-2023040409090892.jpg',
                'note' => 'One important aspect of the local culture in the Shey Phoksundo region is the influence of Tibetan Buddhism, with many monasteries and chortens (stupas) found throughout the area. The Bon Buddhist community, which predates Tibetan Buddhism, also practices their unique form of religion in the area.',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('cultures')->insert($cultureTrek_datas);

        $medicine_datas = [
            //Medicine datas

            [
                'medicine_name' => 'Diamox (Acetazolamide)',
                'illness_name' => 'Altitude sickness',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Loperamide (Imodium)',
                'illness_name' => 'Diarrhea',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Over-the-counter cold medications',
                'illness_name' => 'Common cold ',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Antibiotics prescribed by a doctor',
                'illness_name' => 'Altitude-related respiratory infections',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Pain relievers and bandages',
                'illness_name' => 'Muscular injuries or sprains',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Malarone, Doxycycline',
                'illness_name' => 'Malaria ',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Ciprofloxacin, Azithromycin',
                'illness_name' => 'Typhoid ',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Havrix, Vaqta',
                'illness_name' => 'Hepatitis A',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Rabipur, Verorab',
                'illness_name' => 'Rabies ',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'medicine_name' => 'Stamaril',
                'illness_name' => 'Yellow fever',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            // [
            //     'medicine_name' => '',
            //     'illness_name' => '',
            //     'created_at' => Carbon::now(),
            //     'status' => 'Active'
            // ],

        ];
        DB::table('medicines')->insert($medicine_datas);

        $healthKit_datas = [
            //Trek 1 (Annapurna Circuit Trek) helth kit data

            [
                'trek_id' => 1,
                'medicine_id' => 1,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'medicine_id' => 2,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'medicine_id' => 3,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'medicine_id' => 4,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'medicine_id' => 5,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'medicine_id' => 1,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'medicine_id' => 2,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'medicine_id' => 3,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'medicine_id' => 6,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'medicine_id' => 7,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'medicine_id' => 8,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'medicine_id' => 9,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'medicine_id' => 10,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            // [
            //     'trek_id' => 2,
            //     'medicine_id' => ,
            //     'created_at' => Carbon::now(),
            //     'status' => 'Active'
            // ],

        ];
        DB::table('health_kits')->insert($healthKit_datas);


        $galleryDetail_datas = [
            //Trek 1 (Annapurna Circuit Trek) About data
            [
                'gallery_image' => 'Gallery-2023040203473745.jpg',
                'image_caption' => 'Local people on the 5th stay at lodge',
                'season' => 'Spring',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-202304020357446.jpg',
                'image_caption' => 'Enjoying crossing the bridge',
                'season' => 'Summer',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040204030525.png',
                'image_caption' => 'Beautiful mountains scenery on the trail of Annapurna Circuit Trek',
                'season' => 'Winter',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040204124946.jpg',
                'image_caption' => 'Crossing the bridge ',
                'season' => 'Summer',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040204135683.jpg',
                'image_caption' => 'Crossing the bridge at winter season',
                'season' => 'Winter',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040204153118.gif',
                'image_caption' => 'View point of beautiful Mt Annapurna mountain ',
                'season' => 'Autumn',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040204164468.jpg',
                'image_caption' => 'View of Mt Annapurna Mountain',
                'season' => 'Autumn',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040204174476.jpg',
                'image_caption' => 'Beautiful river view on the way',
                'season' => 'Spring',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            //Trek 1 (Shey Poksundo Trek) About data
            [
                'gallery_image' => 'Gallery-2023040409205080.jpg',
                'image_caption' => 'Half frozen lake during winter season',
                'season' => 'Winter',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040409231932.jpg',
                'image_caption' => 'Waterfall Anmol Jharana Jajarkot',
                'season' => 'Spring',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040409241385.webp',
                'image_caption' => 'Beautiful Shey Pokdusundo lake during summer ',
                'season' => 'Summer',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040409244874.gif',
                'image_caption' => 'Full view of Shey Pokdusundo lake',
                'season' => 'Summer',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040409253371.jpg',
                'image_caption' => 'Shey Poksundo Lake',
                'season' => 'Autumn',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040409262782.jpg',
                'image_caption' => 'Foggy day in Shey Poksundo  Lake',
                'season' => 'Spring',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040409341848.jpg',
                'image_caption' => 'Beautiful morning view in winter season',
                'season' => 'Winter',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040409350159.jpg',
                'image_caption' => 'Suligad bridge ',
                'season' => 'Spring',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'gallery_image' => 'Gallery-2023040409370368.jpg',
                'image_caption' => 'Reading news paper at the one of the most beautiful view point',
                'season' => 'Autumn',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('gallery_details')->insert($galleryDetail_datas);

        $gallery_datas = [
            //Trek 1 (Annapurna Circuit Trek) gallery data

            [
                'trek_id' => 1,
                'gallery_detail_id' => 1,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'gallery_detail_id' => 2,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'gallery_detail_id' => 3,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'gallery_detail_id' => 4,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'gallery_detail_id' => 5,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'gallery_detail_id' => 6,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'gallery_detail_id' => 7,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 1,
                'gallery_detail_id' => 8,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            //Trek 1 (Shey Poksundo Trek) gallery data
            [
                'trek_id' => 2,
                'gallery_detail_id' => 9,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'gallery_detail_id' => 10,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'gallery_detail_id' => 11,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'gallery_detail_id' => 12,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'gallery_detail_id' => 13,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'gallery_detail_id' => 14,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'gallery_detail_id' => 15,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'gallery_detail_id' => 16,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            [
                'trek_id' => 2,
                'gallery_detail_id' => 17,
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],
        ];
        DB::table('galleries')->insert($gallery_datas);

        $map_datas = [
            //Trek 1 (Annapurna Circuit Trek) gallery data
            [
                'trek_id' => 1,
                'route_name' => 'Beshishar to Aarnapurna Circuit Trek',
                'start_point' => '84.3769056496126, 28.23216773318894',
                'path_coordinates' => '[84.3769056496126, 28.23216773318894],[84.37601700728355, 28.23386941316622]',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ],

            //Trek 1 (Shey Poksundo Trek) gallery data
            [
                'trek_id' => 2,
                'route_name' => 'Rupdagad to Shey Poksundo Trek',
                'start_point' => '82.8743797714619, 28.97210030140123',
                'path_coordinates' => '[82.874397520202, 28.97210581823849],
                [82.87399579404965, 28.972680091928655],
                [82.87489210029122, 28.973146106595173],
                [82.87581711389366, 28.975057581945503],
                [82.87605315185343, 28.975353369147545],
                [82.87618711933541, 28.975651945923687],
                [82.87643910580479, 28.975917036740796],
                [82.87667514374209, 28.97612910889198],
                [82.87745024138967, 28.976676029824787],
                [82.87817980223053, 28.976676029824713],
                [82.87841315443443, 28.976744076619894],
                [82.87864650660916, 28.976732344417087],
                [82.8789844649505, 28.976783966100133],
                [82.87907834226218, 28.976898941573015],
                [82.87923391039736, 28.97685670570197],
                [82.87937338526042, 28.976945870302874],
                [82.87984277183075, 28.976605636544882],
                [82.88025314981199, 28.97693179168559],
                [82.88044626887029, 28.977178167194197],
                [82.88074131185735, 28.977365881489934],
                [82.88205559423238, 28.978710375055705],
                [82.88238550598021, 28.979322782571504],
                [82.88257057840967, 28.97987652724055],
                [82.88504715411781, 28.982179579322153],
                [82.8850847050635, 28.98234851402514],
                [82.88539047689521, 28.982655880625128],
                [82.88546021432082, 28.98282246823657],
                [82.8859322830881, 28.98324480183629],
                [82.8859349653014, 28.98333161464809],
                [82.88645531383754, 28.98370467425064],
                [82.88670744150984, 28.98376098502487],
                [82.88831841952309, 28.98508309179351],
                [82.88837422178909, 28.985172247512594],
                [82.88838896271666, 28.985241555702537],
                [82.888143100812, 28.985917021850298],
                [82.88820206450609, 28.98604274274489],
                [82.88858164327361, 28.986453752285602],
                [82.88860928250755, 28.986637497205642],
                [82.88919523421325, 28.9875223694658],[82.88932790252979, 28.98759812320568],
                [82.88955638684388, 28.987928537806738],
                [82.89000389593419, 28.988183049613593],
                [82.89014212449696, 28.988363109816913],
                [82.89015606953485, 28.988451206287834],
                [82.89023509142207, 28.988894398169677],
                [82.890201003559, 28.988982494197128],
                [82.8902288936347, 28.98932810093103],
                [82.89033890448984, 28.989530043158194],
                [82.89056202510271, 28.989657442752772],
                [82.8906611898259, 28.98986480557972],
                [82.89089825547484, 28.990145354625195],
                [82.89107644208445, 28.990354071781308],
                [82.89114306838412, 28.99048147035864],
                [82.89151028771875, 28.990602092270098],
                [82.89151028771875, 28.990602092270098],
                [82.89159550740685, 28.990902968784983],
                [82.89180158407824, 28.991297359638747],
                [82.89185426534074, 28.991386808909827],
                [82.8918589136876, 28.99148438983651],
                [82.89195807840196, 28.991644313933662],
                [82.8920949861511, 28.9920705040056],
                [82.89241325178375, 28.9922645825436],
                [82.89287188860393, 28.992408242105537],
                [82.89308571251853, 28.9926494812869],
                [82.89362182176403, 28.992947641300663],
                [82.89381395340392, 28.99318887922889],
                [82.89396579938469, 28.993993905091326],
                [82.89438724943273, 28.994541427519803],
                [82.89491716089111, 28.995837038346043],
                [82.89488617191799, 28.99598611386145],
                [82.89504731460241, 28.996433339140147],
                [82.8950535124048, 28.996612228710827],
                [82.8950535124048, 28.996612228710827],
                [82.89523324845806, 28.997200393733],
                [82.89532311648156, 28.99730610045384],
                [82.89536959994301, 28.997406386221066],
                [82.89537579774127, 28.99749040935706],
                [82.89556792937546, 28.998081279780468],
                [82.895701181975, 28.998271008111775], [82.89565159962125, 28.998520364803113], [82.89570118197864, 28.9986342013557], [82.8959119069971, 28.998910661026404], [82.89626828019493, 28.99976442887079], [82.89628067579831, 28.999994809477045], [82.89632406036162, 29.00011406511282], [82.8963302581591, 29.000339024231163], [82.89657507104917, 29.000414913945175], [82.89655027987249, 29.00103287095372], [82.8966122578212, 29.001146704747285], [82.89666803797427, 29.00118464931561], [82.89678889496987, 29.001528860101565], [82.89696863101624, 29.0017402645886], [82.89704920235263, 29.00179989141942], [82.89709258691953, 29.001902883132573], [82.89725063068497, 29.002046529296337], [82.89737458657906, 29.00221185765285], [82.89768137741567, 29.002331110731173], [82.89783012449745, 29.002469335716803], [82.89783632230011, 29.002515410672636], [82.89790139914368, 29.00252083125401], [82.89853047530835, 29.002940925448716], [82.89873190365407, 29.003968116321097], [82.89871021138175, 29.004046713636775], [82.89871950807357, 29.004092787888077], [82.89874429925207, 29.004136151869297], [82.89875049704655, 29.004176805586287], [82.89883726616912, 29.004263533460076], [82.89881867278525, 29.004377363686995], [82.89889304631984, 29.004512875696935], [82.89889614522015, 29.00461315447084], [82.89928350738418, 29.005068473075745], [82.89928350738418, 29.005068473075745], [82.90070590131553, 29.00630161757149], [82.90074308809528, 29.00659702803031], [82.90086394509142, 29.006700014966857], [82.90096001091187, 29.006889727466785], [82.90104678004072, 29.006935800452123], [82.90109016460845, 29.007082149791117], [82.90123891168066, 29.007155324384946],[82.90109016460845, 29.007082149791117],
                [82.90123891168066, 29.007155324384946],
                [82.90135047198817, 29.0073612970306],
                [82.90126370286782, 29.007488674649046],
                [82.90143414221835, 29.007927719692454],
                [82.90141554884146, 29.008009024133962],
                [82.90136286758663, 29.00810387922598],
                [82.90138765876165, 29.00820415451384],
                [82.90164796613674, 29.00840741493467],
                [82.9017998121199, 29.008418255477423],
                [82.90191873604144, 29.009523295840083],
                [82.90277472084344, 29.00990531664349],
                [82.90316828082067, 29.010347061516562],
                [82.90331702789248, 29.010466305208407],
                [82.9027344351976, 29.01076983397262],
                [82.90285839109012, 29.010864686528564],
                [82.90304432492891, 29.011295587043485],
                [82.90336970914503, 29.01163163400761],
                [82.90363311542866, 29.0117806867549],
                [82.90377256581625, 29.011964969842374],
                [82.90384074156205, 29.012138412446603],
                [82.90393370848341, 29.012292884522516],
                [82.90403287320223, 29.012970390883215],
                [82.90399258754195, 29.013252232233786],
                [82.90415373020275, 29.013788812659193],
                [82.90416922469426, 29.013940572281616],
                [82.90426838940995, 29.014043551895075],
                [82.90435825743491, 29.014726466716667],
                [82.90443882877054, 29.01482131565357],
                [82.90449460892218, 29.01504353279122],
                [82.90443882877568, 29.015230520015546],
                [82.90462786151204, 29.015577393965504],
                [82.90463715821059, 29.01579689954025],
                [82.90473632292577, 29.015924266759093],
                [82.9047487185158, 29.016100412649568],
                [82.90471772954423, 29.01620610004268],
                [82.90473942182437, 29.01634701639498],
                [82.90482309205224, 29.01644728368367],
                [82.90485717992449, 29.016688466759334],
                [82.90482928985085, 29.016853771691622],
                [82.90486337771978, 29.01688900057913],
                [82.90487887220634, 29.017105793452984], [82.90500902589477, 29.0172060600063],
                [82.90503691597476, 29.017311746266273],
                [82.90499043251722, 29.017430981916913],
                [82.90501212479636, 29.01754208774003],
                [82.90494704795513, 29.018506806431443],
                [82.90487887221683, 29.01872630579321],
                [82.9049129600856, 29.01899187227924],
                [82.90505241046391, 29.01903523001235],
                [82.90529102555756, 29.019514873667163],
                [82.90529412446627, 29.01967475439911],
                [82.90542737705061, 29.019907800436854],
                [82.90545836602891, 29.01998909544494],
                [82.9056040142034, 29.020037872419174],
                [82.90578375025198, 29.020167944232334],
                [82.90587671718059, 29.020598805943244],
                [82.90593249733583, 29.020650292450224],
                [82.90595418961702, 29.02074784574644],
                [82.90596348630898, 29.020802041982297],
                [82.90601306866873, 29.02083455971454],
                [82.90602236536066, 29.020856238194085],
                [82.90599447528484, 29.02089688533099],
                [82.90598517859291, 29.02094566187414],
                [82.90613392566395, 29.021054054109808],
                [82.90623618929199, 29.021189544244375],
                [82.90629196944221, 29.021268128448533],
                [82.90622069480479, 29.021474072959077],
                [82.90585502492013, 29.02211358223581],
                [82.90584572821678, 29.0228181217797],
                [82.90595109072518, 29.02318122875049],
                [82.90605025543921, 29.023289618639723],
                [82.90609054111276, 29.023639175267125],
                [82.90639733195029, 29.024026666885643],
                [82.90641592534871, 29.02409711975831],
                [82.90639733196483, 29.024148604513975],
                [82.90634774960743, 29.024183830911515],
                [82.90630436504388, 29.024454802791524],
                [82.90609983781887, 29.02460925644956],[82.90574036572562, 29.025777135366564],
                [82.90574346461206, 29.02618087700049],
                [82.90560091533385, 29.02660900397053],
                [82.90575276129972, 29.02722951395658],
                [82.90601616757549, 29.02758176688362],
                [82.90605025545007, 29.02769557142023],
                [82.9058085414604, 29.02869271051614],
                [82.90584262932296, 29.028971799372297],
                [82.90654917791328, 29.02999331227574],
                [82.90655847463269, 29.03010711416801],
                [82.90658636470864, 29.03012879070136],
                [82.90663284816834, 29.030126081135002],
                [82.90668862831997, 29.03020736809491],
                [82.9069272434101, 29.030670702545756],
                [82.90701266598963, 29.03085864010814],
                [82.90680876169213, 29.031697295125774],
                [82.90652986093096, 29.032073918452518],
                [82.90655775100677, 29.03239905978249],
                [82.90664761902458, 29.032469506936394],
                [82.90647313399319, 29.032672566575975],
                [82.90645763950597, 29.033485413253732],
                [82.90609816740037, 29.03454752327907],
                [82.9057851787626, 29.035040642029],
                [82.9056232819879, 29.03505504075849],
                [82.90538542101206, 29.035352226913663],
                [82.9051642693344, 29.036971776455207],
                [82.905105390277, 29.037044929883624],
                [82.90473972039338, 29.03788483575001],
                [82.90473042369275, 29.03796882597731],
                [82.90459097331367, 29.03814222490545],
                [82.90446701741932, 29.038532371434663],
                [82.90446701741932, 29.038532371434663],
                [82.90428418245983, 29.039082367167158],
                [82.90421290782149, 29.039239508268153],
                [82.90420980892048, 29.039773244345753],
                [82.90399908389666, 29.04004417530899],
                [82.90385033682651, 29.040577907229807],
                [82.90386273241523, 29.04084341751627],
                [82.90397739161803, 29.041035776581882],
                [82.90378835888205, 29.041100799282603],[82.90376976549817, 29.041220007459028], [82.90355674984276, 29.04152119592663], [82.90390063988612, 29.041735947217468], [82.90409363940533, 29.04204580186353], [82.9038971308038, 29.042220669920233], [82.90390414896486, 29.042386334122888], [82.9024691299693, 29.04459701241524], [82.90229746859808, 29.045230133468], [82.90245303671455, 29.045352067445204], [82.90206143418143, 29.04663705524698], [82.90193805257181, 29.046819953664528], [82.90175029794845, 29.04693250637571], [82.90148207705313, 29.047495268096327], [82.90158936540934, 29.04767347533243], [82.9011763052283, 29.048147129927187], [82.90125677148909, 29.048273750087272], [82.90055403274653, 29.049361739173115], [82.90073642295206, 29.049769732114047], [82.9006559566849, 29.04991041896091], [82.90052184623856, 29.050651366533334], [82.90052721065439, 29.05089053202027], [82.9003877357867, 29.0513172769102], [82.90039846460738, 29.05143920371223], [82.90026971857465, 29.05178153583791], [82.90038773575989, 29.052428681131136], [82.8998459295437, 29.05414969270692], [82.89975473444095, 29.05421065444895], [82.89975473444095, 29.05421065444895], [82.89975473444095, 29.054393539437992], [82.89975473444095, 29.054393539437992], [82.89976546327438, 29.054824959158058], [82.89920219940434, 29.054895299157852], [82.89820441764374, 29.0559738398302], [82.8981826249668, 29.05590185102178], [82.89817503853436, 29.05583553448254], [82.89817503853436, 29.05583553448254], [82.89828504180446, 29.05538458088472], [82.89825090285858, 29.05540779177981], [82.89825848929101, 29.055981430812608], [82.89762122896764, 29.05628317029487], [82.8967011136622, 29.057184610744542], [82.89652283250031, 29.05763555647108], [82.89653421214103, 29.05823239339691],[82.89640903600608, 29.058494337390034],
                [82.89633122718556, 29.058810932848775],
                [82.89612963206554, 29.058830087048733],
                [82.89591488945925, 29.05928595596868],
                [82.89527942657509, 29.05982993135372],
                [82.89487400748187, 29.059978996282382],
                [82.89439631467239, 29.0603161058654],
                [82.89485647747144, 29.060113074088488],
                [82.89336204404286, 29.06102479854927],
                [82.8931341538575, 29.061342750994292],
                [82.89295188346894, 29.06141205207106],
                [82.8928376413162, 29.061379839479528],
                [82.8925501933111, 29.061383060739686],
                [82.89214481791875, 29.061418494588956],
                [82.89180577668057, 29.06152479606459],
                [82.89149621727317, 29.06198865577353],
                [82.89089552466362, 29.062181930030572],
                [82.89053068679812, 29.062819732513116],
                [82.89029851725184, 29.06304199609178]',
                'created_at' => Carbon::now(),
                'status' => 'Active'
            ]
        ];
        DB::table('maps')->insert($map_datas);
    }
}
