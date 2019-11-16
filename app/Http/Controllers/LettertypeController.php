<?php

namespace App\Http\Controllers;

use App\Lettertype;
use Illuminate\Http\Request;

class LettertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lettertype.index');
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
     * @param  \App\Lettertype  $lettertype
     * @return \Illuminate\Http\Response
     */
    public function show(Lettertype $lettertype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lettertype  $lettertype
     * @return \Illuminate\Http\Response
     */
    public function edit(Lettertype $lettertype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lettertype  $lettertype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lettertype $lettertype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lettertype  $lettertype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lettertype $lettertype)
    {
        //
    }
}
