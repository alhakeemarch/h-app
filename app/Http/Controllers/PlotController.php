<?php

namespace App\Http\Controllers;

use App\plot;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index function in plot controler';
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create function in plot controler';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'store function in plot controler';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show(plot $plot)
    {
        return 'show function in plot controler';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(plot $plot)
    {
        return 'edit function in plot controler';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plot $plot)
    {
        return 'update function in plot controler';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function destroy(plot $plot)
    {
        return 'destroy function in plot controler';
    }



    public function check(plot $plot)
    {
        return 'this is plot check method';
    }
}
