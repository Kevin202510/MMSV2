<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'fname' => 'kevin felix',
                'lname' => 'caluag',
                'isApproved' => 1,
                'username' => 'superadmin',
                'password' => Hash::make("password"),
            ],
            [
                'role_id' => 2,
                'fname' => 'Employee',
                'lname' => 'Employee',
                'isApproved' => 1,
                'username' => 'employee',
                'password' => Hash::make("password"),
            ]
            ]);
    }
}
