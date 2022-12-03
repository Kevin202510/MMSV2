<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class Notifyusermmsstatus extends Controller
{
    public function sendEmail(Request $request){
        $data=[
            'sensor_name'=>$request->sensor_name,
            'message' => $request->message,
        ];

        Mail::to('kfc202510@gmail.com')->send(new TestMail($data));
        return back()->with('sucess','thanks for ordering');
    }
}
