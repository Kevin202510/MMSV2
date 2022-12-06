<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_description','date','time','status',
    ];

    // protected $appends = [
    //     'statusName',
    // ];

    // public function getStatusNameAttribute()
    // { 
    //     $isUnread="Read";
    //     if($this->status==0){
    //         $isUnread = "Unread";
    //     }
    // }
}
