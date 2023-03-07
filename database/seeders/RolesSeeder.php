<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
              'id'   => 1, 
              'display_name'  => 'Administrator',
            ],
            [
              'id'   => 2,
              'display_name' => 'Employee',
            ]
            ]
            );
    }
}
