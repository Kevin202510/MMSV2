<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controldevices;

class SensorControlsController extends Controller
{
    public function index()
    {
        $controldevices=Controldevices::whereNull('deleted_at')
                                        ->orderBy('id', 'ASC')->get();
        return response()->json($controldevices);
    }

    public function triggerSprinkler(Request $request, Controldevices $controldevices)
    {
        $controldevices->sensor_status_val = $request->sensor_status_val;
        $controldevices->update();
        return response()->json($controldevices, 200);
    }

    public function triggerLights(Request $request, Controldevices $controldevices)
    {
        $controldevices->sensor_status_val = $request->sensor_status_val;
        $controldevices->update();
        return response()->json($controldevices, 200);
    }
}
