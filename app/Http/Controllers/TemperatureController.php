<?php

namespace App\Http\Controllers;

use App\Temperature;
use Illuminate\Http\Request;
use PDF;
use App\Exports\TemperatureExport;

class TemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temperature=Temperature::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->get();
        return response()->json($temperature);
    }

    public function index2()
    {
        $temperature=Temperature::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->limit(10)->get();
        return response()->json($temperature);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        // $datefrom = $request->datef;
        // $dateto = $request->datet;
        // dd($substring->format('M-d-Y'),$substring1->format('M-d-Y'));
        // $temperature=Temperature::whereBetween('created_at',[$request->datef,$request->datet])->get();
        $temperature=Temperature::all();
        $temperaturedata = PDF::loadView('temperature.exportTemperature',compact('temperature'));
        // return $temperaturedata->download('temperature-data.pdf');
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
     * @param  \App\Temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function show(Temperature $temperature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function edit(Temperature $temperature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temperature $temperature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temperature $temperature)
    {
        //
    }
}
