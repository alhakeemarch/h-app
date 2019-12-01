<?php

namespace App\Http\Controllers;

use App\SaudiCity;
use Illuminate\Http\Request;

class SaudiCityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saudi_cities = SaudiCity::all();
        return view('saudiCity.index')->with('saudi_cities', $saudi_cities);
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
     * @param  \App\SaudiCity  $saudiCity
     * @return \Illuminate\Http\Response
     */
    public function show(SaudiCity $saudiCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaudiCity  $saudiCity
     * @return \Illuminate\Http\Response
     */
    public function edit(SaudiCity $saudiCity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaudiCity  $saudiCity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaudiCity $saudiCity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaudiCity  $saudiCity
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaudiCity $saudiCity)
    {
        //
    }
}
