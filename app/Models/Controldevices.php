<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controldevices extends Model
{
    use HasFactory;
    protected $fillable = [
        'sensor_name','sensor_status_val',
    ];


    protected $appends = [
        'statusName',
    ];

    public function getstatusNameAttribute()
    { 
        $status="Device is On";
        
        if($this->sensor_status_val==0){
            $status = "Device is Off";
        }
        return $status;
    }
}
