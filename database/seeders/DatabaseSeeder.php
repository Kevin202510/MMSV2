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
        $this->call([
            CarbondioxidesSeeder::class,
            HumiditySeeder::class,
            LightsSeeder::class,
            RoleSeeder::class,
            SensorconfigurationSeeder::class,
            NotificationSeeder::class,
            TemperatureSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
