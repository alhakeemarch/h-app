<?php

namespace App\Http\Controllers;

use App\PlotDoc;
use Illuminate\Http\Request;

class PlotDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plotDoc.index');
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
     * @param  \App\PlotDoc  $plotDoc
     * @return \Illuminate\Http\Response
     */
    public function show(PlotDoc $plotDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlotDoc  $plotDoc
     * @return \Illuminate\Http\Response
     */
    public function edit(PlotDoc $plotDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlotDoc  $plotDoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlotDoc $plotDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlotDoc  $plotDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlotDoc $plotDoc)
    {
        //
    }
}
