<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city=['teh','shiraz','sari','gom','esfehan','mashhad','asaloye'];
        $terminal=['jnob','byhagi','sharg'];
        $type=['VIP','second grade',' third grade'];
        $faker=\Faker\Factory::create();
        foreach(range(0,10) as $item){
            DB::table('tickets')->insert([
                'license_plate'=>rand(10,20),
                'passenger'=>rand(20,30),
                'final_destination'=>$city[array_rand($city)],
                // 'secondary_destination'=>$city[array_rand($city)],
                'origin'=>$city[array_rand($city)],
                'destination_terminal'=>$terminal[array_rand($terminal)],
                'origin_terminal'=>$terminal[array_rand($terminal)],
                'type'=>$type[array_rand($type)],
                'price'=>rand(500,8000),
                'info'=>$faker->text(10),
                'time'=>now(),
            ]);

        }
    }
}
