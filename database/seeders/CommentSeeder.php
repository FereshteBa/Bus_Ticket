<?php

namespace Database\Seeders;

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
        $comment=['بسیار عالی' ,'بسیار خوب', 'خیلی خوب' ];
        foreach (range(0, 5) as $item) {
            DB::table('comments')->insert([
                'user_id'=>rand(1,10),
                'body'=>$comment[array_rand($comment)]
            ]);
        }
    }
}
