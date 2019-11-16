<?php

namespace App\Http\Controllers;

use App\Contractfield;
use Illuminate\Http\Request;

class ContractfieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contractfield.index');
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
     * @param  \App\Contractfield  $contractfield
     * @return \Illuminate\Http\Response
     */
    public function show(Contractfield $contractfield)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contractfield  $contractfield
     * @return \Illuminate\Http\Response
     */
    public function edit(Contractfield $contractfield)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contractfield  $contractfield
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contractfield $contractfield)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contractfield  $contractfield
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractfield $contractfield)
    {
        //
    }
}
