<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorconfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensorsconfigurations')->insert([
            [
              'id'   => 1, 
              'configuration_name'  => 'Oyster Mushroom',
              'mushroom_image'  => 'oysmush.webp',
              'description'  => 'oyster mushroom, oyster fungus, or hiratake, is a common edible mushroom.',
              'configuration_value'  => '{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}',
              'isActive'  => 1,
            ],
            [
                'id'   => 2, 
                'configuration_name'  => 'Button Mushroom',
                'mushroom_image'  => 'btnmush.webp',
                'description'  => 'White buttons feature the classic mushroom umami flavor that is slightly milder than other varieties of mushrooms.',
                'configuration_value'  => '{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}',
                'isActive'  => 0,
              ],
              [
                  'id'   => 3, 
                  'configuration_name'  => 'Cup Mushroom',
                  'mushroom_image'  => 'btnmush.webp',
                  'description'  => 'Cup fungus refers to a wide group of fungi in the Pezizales order (phylum Ascomycota). These are typically identified by a disk- or cup-shaped structure',
                  'configuration_value'  => '{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}',
                  'isActive'  => 0,
                ]
            ]
            );
    }
}
