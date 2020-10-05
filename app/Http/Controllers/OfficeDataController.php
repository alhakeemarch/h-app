<?php

namespace App\Http\Controllers;

use App\OfficeData;
use Illuminate\Http\Request;

class OfficeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = OfficeData::all();
        return view('officeData.index')->with(['offices' => $offices]);
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
     * @param  \App\OfficeData  $officeData
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeData $officeData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfficeData  $officeData
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeData $officeData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfficeData  $officeData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeData $officeData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfficeData  $officeData
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeData $officeData)
    {
        //
    }
    public static function firstInsertion()
    {
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->name;
        $officeDatas = array(
            [
                'name_ar' => 'عبدالرزاق حكيم للإستشارات الهندسية',
                'phone' => '920020544',
                'phone1' => '0148650000',
                'email' => 'ahc@hakeemarch.com',
                'SEC_license_no' => '692',
                'SEC_license_issue_date' => '1412-08-07',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],

        );
        if (OfficeData::all()->count() >= count($officeDatas)) {
            return false;
        }
        // -------------------------------------
        foreach ($officeDatas as $officeData) {
            $new_type = new OfficeData();
            $new_type->create($officeData);
        }
        return true;
    }
}
