<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorControlsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('controldevices')->insert([
            [
              'id'   => 1, 
              'sensor_name'  => 'Temperature',
              'sensor_status_val'  => 1,
            ],
            [
                'id'   => 2, 
                'sensor_name'  => 'Humidity',
                'sensor_status_val'  => 1,
              ],
              [
                'id'   => 3, 
                'sensor_name'  => 'Carbon Dioxide',
                'sensor_status_val'  => 1,
              ],
              [
                'id'   => 4, 
                'sensor_name'  => 'Lights',
                'sensor_status_val'  => 1,
              ],
            ]
            );
    }
}
