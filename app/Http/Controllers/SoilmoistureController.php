<?php

namespace App\Http\Controllers;

use App\Models\Soilmoisture;
use Illuminate\Http\Request;

class SoilmoistureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soilmoisture=Soilmoisture::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->get();
        return response()->json($soilmoisture);
    }

    public function index2()
    {
        $soilmoisture=Soilmoisture::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->limit(10)->get();
        return response()->json($soilmoisture);
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
     * @param  \App\Models\Soilmoisture  $soilmoisture
     * @return \Illuminate\Http\Response
     */
    public function show(Soilmoisture $soilmoisture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soilmoisture  $soilmoisture
     * @return \Illuminate\Http\Response
     */
    public function edit(Soilmoisture $soilmoisture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soilmoisture  $soilmoisture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soilmoisture $soilmoisture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soilmoisture  $soilmoisture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soilmoisture $soilmoisture)
    {
        //
    }
}
