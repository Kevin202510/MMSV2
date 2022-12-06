<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;
use Hash, Carbon\Carbon;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications=Notifications::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->get();
        return response()->json($notifications);
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $notifications=Notifications::create($input); 
        return response()->json($notifications);
    }

    public function destroy(Notifications $notifications)
    {
        $notifications->deleted_at = Carbon::now();
        $notifications->update();
        return response()->json(array('success'=>true));
    }
}
