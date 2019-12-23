<?php

namespace App\Http\Controllers;

use App\AllowedBuildingRatio;
use Illuminate\Http\Request;

class AllowedBuildingRatioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $building_ratios = AllowedBuildingRatio::all();
        return view('allowedBuildingRatio.index')->with('building_ratios', $building_ratios);
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
     * @param  \App\AllowedBuildingRatio  $allowedBuildingRatio
     * @return \Illuminate\Http\Response
     */
    public function show(AllowedBuildingRatio $allowedBuildingRatio)
    {
        return view('allowedBuildingRatio.show')->with('allowedBuildingRatio', $allowedBuildingRatio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AllowedBuildingRatio  $allowedBuildingRatio
     * @return \Illuminate\Http\Response
     */
    public function edit(AllowedBuildingRatio $allowedBuildingRatio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AllowedBuildingRatio  $allowedBuildingRatio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllowedBuildingRatio $allowedBuildingRatio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AllowedBuildingRatio  $allowedBuildingRatio
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllowedBuildingRatio $allowedBuildingRatio)
    {
        //
    }
    /**
     * insert inital allowed building ratios data to db.
     */
    public static function firstInsertion()
    {
        $buildingRatios = [
            '10',
            '20',
            '30',
            '40',
            '50',
            '60',
            '70',
            '80',
            '90',
            '100',
        ];

        if (AllowedBuildingRatio::all()->count() >= count($buildingRatios)) {
            return false;
        }
        foreach ($buildingRatios as $key => $value) {
            $allowedbuildingRatio = new AllowedBuildingRatio();
            $allowedbuildingRatio->building_ratio = $value;
            $allowedbuildingRatio->save();
        }
        return true;
    }
}
