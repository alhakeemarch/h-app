<?php

namespace App\Http\Controllers;

use App\AllowedBuildingHeight;
use Illuminate\Http\Request;

class AllowedBuildingHeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allowed_building_heights = AllowedBuildingHeight::all();
        // return $allowed_building_heights;
        return view('allowedBuildingHeight.index')->with('allowed_building_heights', $allowed_building_heights);
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
     * @param  \App\AllowedBuildingHeight  $allowedBuildingHeight
     * @return \Illuminate\Http\Response
     */
    public function show(AllowedBuildingHeight $allowedBuildingHeight)
    {
        return view('allowedBuildingHeight.show')->with('allowed_building_height', $allowedBuildingHeight);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AllowedBuildingHeight  $allowedBuildingHeight
     * @return \Illuminate\Http\Response
     */
    public function edit(AllowedBuildingHeight $allowedBuildingHeight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AllowedBuildingHeight  $allowedBuildingHeight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllowedBuildingHeight $allowedBuildingHeight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AllowedBuildingHeight  $allowedBuildingHeight
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllowedBuildingHeight $allowedBuildingHeight)
    {
        //
    }
    /**
     * insert inital allowed building heights data to db.
     */
    public static function firstInsertion()
    {
        $buildingHeights = [
            'سور فقط',
            'سور و ملحق أرضي',
            'دور واحد فقط',
            'دور واحد ملحق',
            '2 دور فقط',
            '2 دور وملحق',
            '3 دور فقط',
            '3 دور وملحق',
            '4 دور فقط',
            '4 دور وملحق',
            '5 دور فقط',
            '5 دور وملحق',
            '6 دور فقط',
            '6 دور وملحق',
            '7 دور فقط',
            '7 دور وملحق',
            '8 دور فقط',
            '8 دور وملحق',
            '9 دور فقط',
            '9 دور وملحق',
            '10 دور فقط',
            '10 دور وملحق',
            '11 دور فقط',
            '11 دور وملحق',
            '12 دور فقط',
            '12 دور وملحق',
            '13 دور فقط',
            '13 دور وملحق',
            '14 دور فقط',
            '14 دور وملحق',
            '15 دور فقط',
            '15 دور وملحق',
            '16 دور فقط',
            '16 دور وملحق',
            '17 دور فقط',
            '17 دور وملحق',
            '18 دور فقط',
            '18 دور وملحق',
            '19 دور فقط',
            '19 دور وملحق',
            '20 دور فقط',
            '20 دور وملحق',
        ];

        if (AllowedBuildingHeight::all()->count() >= count($buildingHeights)) {
            return false;
        }

        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->name;
        foreach ($buildingHeights as $key => $value) {
            $allowedbuildingHeight = new AllowedBuildingHeight();
            $allowedbuildingHeight->building_Height = $value;
            $allowedbuildingHeight->created_by_id = $created_by_id;
            $allowedbuildingHeight->created_by_name = $created_by_name;
            $allowedbuildingHeight->save();
        }
        return true;
    }
}
