<?php

namespace App\Http\Controllers;

use App\Street;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $street_cout = Street::all()->count();
        $streets = Street::paginate(10);
        return view('street.index')->with([
            'streets' => $streets,
            'street_cout' => $street_cout,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function search(Request $request)
    {
        if ($request->method() === "GET") {
            return redirect()->action('StreetController@index');
        }
        $request->validate([
            'street_name' => 'required|string|regex:/[ء-ي]/',
        ]);

        $street_name = $request['street_name'];
        // $all_streets = Street::where('ar_name', 'LIKE',  "%$street_name%")->get(); // ما نقدر نعمل بيجنيشن
        $all_streets = Street::where('ar_name', 'LIKE',  "%$street_name%");

        $street_cout = $all_streets->count();
        $streets = $all_streets->paginate($street_cout);

        return view('street.index')->with([
            'streets' => $streets,
            'street_cout' => $street_cout,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\street  $street
     * @return \Illuminate\Http\Response
     */
    public function show(street $street)
    {
        return view('street.show')->with('street', $street);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\street  $street
     * @return \Illuminate\Http\Response
     */
    public function edit(street $street)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\street  $street
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, street $street)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\street  $street
     * @return \Illuminate\Http\Response
     */
    public function destroy(street $street)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function check(Request $request, street $street)
    {
        return redirect()->action('StreetController@index')->withErrors(['cannot add yet!!']);
        // return redirect()->action('StreetController@create');
    }

    // -----------------------------------------------------------------------------------------------------------------
    public static function firstInsertion()
    {

        $all_streets = \App\Data\Streets_arr::git_streets();

        if (Street::all()->count() >= count($all_streets)) {
            return false;
        }

        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->user_name;


        foreach ($all_streets as $street) {


            $new_street = new Street();

            $new_street->created_by_id = $created_by_id;
            $new_street->created_by_name = $created_by_name;

            foreach ($street as $key => $value) {
                if ($value) {
                    $new_street->$key =  $value;
                }
            }


            // return $new_street;
            $new_street->save();
        }
        return 'true';
    }
    // -----------------------------------------------------------------------------------------------------------------
}
