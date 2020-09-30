<?php

namespace App\Http\Controllers;

use App\SoilLaboratory;
use Illuminate\Http\Request;

class SoilLaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\SoilLaboratory  $soilLaboratory
     * @return \Illuminate\Http\Response
     */
    public function show(SoilLaboratory $soilLaboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoilLaboratory  $soilLaboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(SoilLaboratory $soilLaboratory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoilLaboratory  $soilLaboratory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoilLaboratory $soilLaboratory)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoilLaboratory  $soilLaboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoilLaboratory $soilLaboratory)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function firstInsertion()
    {
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->name;
        $soil_laboratories = array(
            [
                'name_ar' => 'المختبرات السعودية',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],

        );
        if (SoilLaboratory::all()->count() >= count($soil_laboratories)) {
            return false;
        }
        // -------------------------------------
        foreach ($soil_laboratories as $soilLaboratory) {
            $new_type = new SoilLaboratory();
            $new_type->create($soilLaboratory);
        }
        return true;
    }
}
