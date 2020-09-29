<?php

namespace App\Http\Controllers;

use App\ProjectStatus;
use Illuminate\Http\Request;

class ProjectStatusController extends Controller
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
     * @param  \App\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectStatus $projectStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectStatus $projectStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectStatus $projectStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectStatus $projectStatus)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function firstInsertion()
    {
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->name;
        $officeDatas = array(
            [
                'name_ar' => 'التعاقد',
                'name_en ' => 'contracting',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'اعمال مساحية',
                'name_en ' => 'survey work',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'فكرة',
                'name_en ' => 'concept',
                'description ' => null,
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
