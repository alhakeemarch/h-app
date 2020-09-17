<?php

namespace App\Http\Controllers;

use App\ProjectDoc;
// use PDF;
use Barryvdh\DomPDF\Facade as PDF;
// use 'PDF' => Barryvdh\DomPDF\Facade::class,  // by fa
use Illuminate\Http\Request;

class ProjectDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return view('projectDoc.tafweed');
        // return view('projectDoc.index');


        $pdf = PDF::loadView('projectDoc.tafweed');
        return $pdf->download('a.pdf');
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
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDoc $projectDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectDoc $projectDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectDoc $projectDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectDoc  $projectDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDoc $projectDoc)
    {
        //
    }
}
