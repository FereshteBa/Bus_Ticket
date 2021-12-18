<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Role::factory(3)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PriceSeeder::class,
            TicketSeeder::class,
            CommentSeeder::class,
            AboutUsSeeder::class,
            ReserveSeeder::class
        ]);

    }
}
