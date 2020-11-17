<?php

namespace App\Http\Controllers;

use App\ProjectDocType;
use Illuminate\Http\Request;

class ProjectDocTypeController extends Controller
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
     * @param  \App\ProjectDocType  $projectDocType
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDocType $projectDocType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectDocType  $projectDocType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectDocType $projectDocType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectDocType  $projectDocType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectDocType $projectDocType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectDocType  $projectDocType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDocType $projectDocType)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function firstInsertion()
    {
        $created_by_id = auth()->user()->id;

        $poject_doc_types = array(
            // [
            //     'name_ar' => 'تفويض',
            //     'title' => 'تفويض',
            //     'view_template' => 'projectDoc.tafweed',
            //     'header_foooter_template' => 'hakeem_header_footer',
            //     'created_by_id' => $created_by_id,
            // ],
            [
                'name_ar' => 'عرض سعر',
                'title' => 'عرض سعر',
                'view_template' => 'projectDoc.quotation',
                'header_foooter_template' => 'hakeem_header_footer',
                'is_public' => false,
                'created_by_id' => $created_by_id,
            ],
            [
                'name_ar' => 'تفويض المساحة',
                'title' => 'تفويض المساحة',
                'view_template' => 'projectDoc.tafweed_masaha',
                'created_by_id' => $created_by_id,
            ],
            [
                'name_ar' => 'تعهد المخاطر',
                'title' => 'تعهد المخاطر',
                'view_template' => 'projectDoc.t_makhater',
                'header_foooter_template' => 'amana_header_footer',
                'created_by_id' => $created_by_id,
            ],
            [
                'name_ar' => 'تعهد السور',
                'title' => 'تعهد السور',
                'view_template' => 'projectDoc.t_soor',
                'header_foooter_template' => 'amana_header_footer',
                'created_by_id' => $created_by_id,
            ],
            [
                'name_ar' => 'تعهد العزل',
                'title' => 'تعهد العزل',
                'view_template' => 'projectDoc.t_azel',
                'created_by_id' => $created_by_id,
            ],
            [
                'name_ar' => 'تعهد المياه',
                'title' => 'تعهد المياه',
                'view_template' => 'projectDoc.t_meyaah',
                'created_by_id' => $created_by_id,
            ],
            [
                'name_ar' => 'غلاف المذكرة الإنشائية',
                'title' => 'غلاف المذكرة الإنشائية',
                'view_template' => 'projectDoc.str_notes_cover',
                'created_by_id' => $created_by_id,
            ],
            [
                'name_ar' => 'تقرير ارض فضاء',
                'title' => 'تقرير ارض فضاء',
                'view_template' => 'projectDoc.str_notes_cover',
                'header_foooter_template' => 'hakeem_header_footer',
                'created_by_id' => $created_by_id,
            ],
            [
                'name_ar' => 'طلب ربط رخصة بالقرار المساحي',
                'title' => 'طلب ربط رخصة بالقرار المساحي',
                'view_template' => 'projectDoc.request_bind_to_baladi',
                'header_foooter_template' => 'hakeem_header_footer',
                'created_by_id' => $created_by_id,
            ],
        );
        if (ProjectDocType::all()->count() >= count($poject_doc_types)) {
            return false;
        }
        // -------------------------------------
        foreach ($poject_doc_types as $poject_doc_type) {
            $new_type = new ProjectDocType();
            $new_type->create($poject_doc_type);
        }
        return true;
    }
}
