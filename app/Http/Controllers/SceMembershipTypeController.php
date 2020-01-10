<?php

namespace App\Http\Controllers;

use App\SceMembershipType;
use Illuminate\Http\Request;

class SceMembershipTypeController extends Controller
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
     * @param  \App\SceMembershipType  $sceMembershipType
     * @return \Illuminate\Http\Response
     */
    public function show(SceMembershipType $sceMembershipType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SceMembershipType  $sceMembershipType
     * @return \Illuminate\Http\Response
     */
    public function edit(SceMembershipType $sceMembershipType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SceMembershipType  $sceMembershipType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SceMembershipType $sceMembershipType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SceMembershipType  $sceMembershipType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SceMembershipType $sceMembershipType)
    {
        //
    }


    public static function firstInsertion()
    {
        $sce_membership_types = array(
            [
                'name_en' => 'Engineer',
                'name_ar' => 'مهندس',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Associate Engineer',
                'name_ar' => 'مهندس مشارك',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Professional engineer',
                'name_ar' => 'مهندس محترف',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Consultant engineer',
                'name_ar' => 'مهندس مستشار',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Technician',
                'name_ar' => 'فني',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Interested',
                'name_ar' => 'مهتم',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'name_en' => 'Student',
                'name_ar' => 'طالب',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],


        );
        /*******************************************************************************************************/
        if (SceMembershipType::all()->count() >= count($sce_membership_types)) {
            return false;
        }
        // -------------------------------------
        foreach ($sce_membership_types as $sce_membership_type) {
            $new_sce_membership_type = new SceMembershipType();
            $new_sce_membership_type->create($sce_membership_type);
        }
        return true;
    }
}
