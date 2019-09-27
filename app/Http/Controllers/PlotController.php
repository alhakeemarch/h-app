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
        return view('plot.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plot.create');
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
        return view('plot.shwo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(plot $plot)
    {
        return view('plot.edit');
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



    public function check( Request $request,plot $plot)
    {
        // return view('/plot/check')->withErrors(['Undefined Person type', 'please Contact the Administrator']);





        if ($request->method() === "GET") {
            return view('/plot/check');
        }
// return $request;
        $validatedData = $request->validate([
            'deed_no' => 'required',
        ]);

        $found_deed = $plot->where('deed_no', $request->deed_no)->first();
        $found_deed = false;

        
        if ($found_deed) {

            return redirect()->action('PlotController@show', ['id' => $found_deed->id]);
        } else {
            return redirect()->action('PlotController@create', $request);
        }



    }
}
