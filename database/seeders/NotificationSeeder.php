<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'sensor_id' => 1,
                'notification_description'  => '45 °C Temperature is to High',
                'status' => 0,
            ],
            [
                'sensor_id' => 1,
                'notification_description'  => '30 °C Temperature is to High',
                'status' => 2,
            ],
            [
                'sensor_id' => 2,
                'notification_description'  => '68% Humidity Is Too High',
                'status' => 0,
            ],
            [
                'sensor_id' => 2,
                'notification_description'  => '30% Humidity Is Too Low',
                'status' => 2,
            ],
            [
                'sensor_id' => 3,
                'notification_description'  => '200 lm Lights is to High',
                'status' => 0,
            ],
            [
                'sensor_id' => 3,
                'notification_description'  => '150 lm Lights is to Low',
                'status' => 2,
            ],
            [
                'sensor_id' => 4,
                'notification_description'  => '1000 ppm Carbon Dioxide is to High',
                'status' => 0,
            ],
            [
                'sensor_id' => 4,
                'notification_description'  => '600 ppm Carbon Dioxide is to Low',
                'status' => 2,
            ]
            ]
            );
    }
}
