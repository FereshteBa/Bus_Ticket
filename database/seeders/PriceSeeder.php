<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city=['teh','shiraz','sari','gom','esfehan','mashhad','asaloye'];
        $type=['VIP','second grade',' third grade'];
        $faker=\Faker\Factory::create();
        foreach (range(0, 20) as $item) {
            DB::table('prices')->insert([
                'type'=>$type[array_rand($type)],
                'origin'=>$city[array_rand($city)],
                'destination'=>$city[array_rand($city)],
                'cost'=>rand(500,8000),
            ]);
        }
    }
}
