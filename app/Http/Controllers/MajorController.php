<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('major.index');
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
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        //
    }

    public static function firstInsertion()
    {
        /*******************************************************************************************************
         *      1) key = name_en
         *      2) value = name_en
         *******************************************************************************************************/
        $majors = array(
            '' => 'هندسة معمارية',
            '' => 'هندسة تخطيط',
            '' => 'هندسة مدنية',
            '' => 'هندسة ميكانيكية',
            '' => 'هندسة كهربائية',
            '' => '',
        );

        /*******************************************************************************************************/
        if (Major::all()->count() >= count($majors)) {
            return false;
        }

        // -------------------------------------
        $aad_user_id = auth()->user()->id;
        $add_user_name = auth()->user()->user_name;
        // -------------------------------------
        foreach ($majors as $key => $value) {
            $major = new Major();
            $major->created_by_id = $aad_user_id;
            $major->created_by_name = $add_user_name;
            // -------------------------------------
            $major->name_en = $key;
            $major->name_ar = $value;
            // -------------------------------------
            $major->save();
        }

        return true;
    }
}
