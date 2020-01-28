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
        $majors = Major::all();
        return view('major.index')->with('majors', $majors);
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
         *      https://langvara.com/ar/%D8%A3%D8%B3%D9%85%D8%A7%D8%A1-%D8%A7%D9%84%D9%85%D9%87%D9%86-%D9%88%D8%AA%D8%B1%D8%AC%D9%85%D8%AA%D9%87%D8%A7-%D8%A5%D9%84%D9%89-%D8%A7%D9%84%D8%A5%D9%86%D8%AC%D9%84%D9%8A%D8%B2%D9%8A%D8%A9/
         *******************************************************************************************************/
        $majors = array(
            'architecture engineering' => 'هندسة معمارية',
            'landscape engineering' => 'هندسة تخطيط',
            'structure engineering' => 'هندسة مدنية',
            'mechanical engineering' => 'هندسة ميكانيكية',
            'electrical engineering' => 'هندسة كهربائية',
            'land survey' => 'مساحة',
            'architecture draftsman' => 'الرسم المعماري',
            'building technician' => 'فني أبنية - مراقب أبنية',
        );

        /*******************************************************************************************************/
        if (Major::all()->count() >= count($majors)) {
            return false;
        }

        // -------------------------------------
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->user_name;
        // -------------------------------------
        foreach ($majors as $key => $value) {
            $major = new Major();
            $major->created_by_id = $created_by_id;
            $major->created_by_name = $created_by_name;
            // -------------------------------------
            $major->major_en = $key;
            $major->major_ar = $value;
            // -------------------------------------
            $major->save();
        }

        return true;
    }
}
