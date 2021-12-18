<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReserveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender=['male','female'];
        foreach (range(0, 20) as $item) {
            DB::table('reserves')->insert([
                'national_code'=>rand(15,17),
                'Seatـnumber1'=>rand(1,15),
                // 'Seatـnumber2'=>rand(1,15),
                // 'Seatـnumber3'=>rand(1,15),
                'Total'=>rand(1000,4000),
                'gender'=>$gender[array_rand($gender)],
                'user_id'=>rand(1,10),
                'ticket_id'=>rand(1,10),
            ]);
        }
    }
}
