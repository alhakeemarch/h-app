<?php

namespace App\Http\Controllers;

use App\AllowedUsage;
use Illuminate\Http\Request;

class AllowedUsageController extends Controller
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
     * @param  \App\AllowedUsage  $allowedUsage
     * @return \Illuminate\Http\Response
     */
    public function show(AllowedUsage $allowedUsage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AllowedUsage  $allowedUsage
     * @return \Illuminate\Http\Response
     */
    public function edit(AllowedUsage $allowedUsage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AllowedUsage  $allowedUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllowedUsage $allowedUsage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AllowedUsage  $allowedUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllowedUsage $allowedUsage)
    {
        //
    }
    /**
     * insert inital allowed usage data to db.
     */
    public static function firstInsertion()
    {
        $usages = [
            'سكني',
            'سكني تجاري',
            'تجاري',
            'إداري',
            'تعليمي',
            'محطة محروقات',
            'صحي',
            'مستشفى',
            'حكومي',
            'مسجد',
            'خيري',
        ];

        if (AllowedUsage::all()->count() >= count($usages)) {
            return false;
        }
        foreach ($usages as $key => $value) {
            $allowedUsage = new AllowedUsage();
            $allowedUsage->usage = $value;
            $allowedUsage->save();
        }
        return true;
    }
}
