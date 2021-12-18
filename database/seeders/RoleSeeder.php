<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            ['id'=>1,'name'=>'admin'],
            ['id'=>2, 'name'=>'user'],
            ['id'=>3,'name'=>'superuser'],
            ['id'=>4, 'name'=>'company'],
        ];
        DB::table('roles')->insert($roles);
    }
}
