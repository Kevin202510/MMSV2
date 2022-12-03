<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Hash, Carbon\Carbon;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Roles::whereNull('deleted_at')->get();
        return response()->json($roles);
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $roles=Roles::create($input); 
        return response()->json($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles)
    {
        $input = $request->all();
        $roles->update($input);
        return response()->json($roles, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles)
    {
        $roles->deleted_at = Carbon::now();
        $roles->update();
        return response()->json(array('success'=>true));
    }
}
