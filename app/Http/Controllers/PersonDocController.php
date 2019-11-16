<?php

namespace App\Http\Controllers;

use App\PersonDoc;
use Illuminate\Http\Request;

class PersonDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personDoc.index');
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
     * @param  \App\PersonDoc  $personDoc
     * @return \Illuminate\Http\Response
     */
    public function show(PersonDoc $personDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonDoc  $personDoc
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonDoc $personDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonDoc  $personDoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonDoc $personDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonDoc  $personDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonDoc $personDoc)
    {
        //
    }
}
