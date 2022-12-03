<?php

namespace App\Http\Controllers;

use App\Models\Waterlevel;
use Illuminate\Http\Request;

class WaterlevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waterlevel=Waterlevel::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->get();
        return response()->json($waterlevel);
    }

    public function index2()
    {
        $waterlevel=Waterlevel::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->limit(10)->get();
        return response()->json($waterlevel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waterlevel  $waterlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Waterlevel $waterlevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waterlevel  $waterlevel
     * @return \Illuminate\Http\Response
     */
    public function edit(Waterlevel $waterlevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Waterlevel  $waterlevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waterlevel $waterlevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waterlevel  $waterlevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waterlevel $waterlevel)
    {
        //
    }
}
