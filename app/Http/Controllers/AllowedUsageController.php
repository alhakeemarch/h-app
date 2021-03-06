<?php

namespace App\Http\Controllers;

use App\AllowedUsage;
use Illuminate\Http\Request;

class AllowedUsageController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usages = AllowedUsage::all();
        return view('allowedUsage.index')->with('usages', $usages);
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
     * @param  \App\AllowedUsage  $allowedUsage
     * @return \Illuminate\Http\Response
     */
    public function show(AllowedUsage $allowedUsage)
    {
        return view('allowedUsage.show')->with('allowedUsage', $allowedUsage);
    }
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
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
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->name;
        foreach ($usages as $key => $value) {
            $allowedUsage = new AllowedUsage();
            $allowedUsage->usage = $value;
            $allowedUsage->created_by_id = $created_by_id;
            $allowedUsage->created_by_name = $created_by_name;
            $allowedUsage->save();
        }
        return true;
    }
    // -----------------------------------------------------------------------------------------------------------------
}
