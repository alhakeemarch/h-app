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
        //
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
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show(plot $plot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(plot $plot)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function destroy(plot $plot)
    {
        //
    }
    public function check(plot $plot)
    {
        return 'this is plot check method';
    }
}
