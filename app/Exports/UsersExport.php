<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function view():View
    {
        return view('users.exportusersData',[
            'users'=>$this->users
        ]);
    }
}
