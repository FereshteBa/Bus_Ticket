<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment=['بسیار عالی' ,'بسیار خوب', 'خیلی خوب' ];

        $faker=\Faker\Factory::create();
        foreach(range (1,10) as $item){
            DB::table('users')->insert([
                'name'=>$faker->text(10),
                'email'=>$faker->email(),
                'password'=>Hash::make(rand(9,12)),
                'comment'=>$comment[array_rand($comment)],
                'role_id'=>rand(1,4),
                'created_at'=>now(),
                'updated_at'=>now()

            ]);

        }
    }
}
