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
        $project_statuses = array(
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
            [
                'name_ar' => 'انتظار موافقة العميل على الفكرة',
                'name_en ' => 'Customer approval',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'التقديم لإعتماد الفكرة',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'اصدار موافقات اضافية',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'المخططات النهائية',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'التقديم للإعتماد',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'ملاحظات قبل الاعتماد',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'رسوم حكومية',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'طباعة الرخصة',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'طباعة المخططات للعميل',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع منتهي مكتمل',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف بناء على طلب العميل',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف بسبب فني',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف بسبب الاشتراطات',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف في انتظار موافقات حكومية',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف في انتظار اجراءات حكومية',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف بسبب خلاف مالي',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف لسداد دفعات المكتب',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف لعدم مراجعة العميل',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'مشروع متوقف لعدم مراجعة العميل',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'ملغي بناء على طلب العميل',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'ملغي بسبب خلاف مع العميل',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'ملغي',
                'name_en ' => '',
                'description ' => null,
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],

        );
        if (ProjectStatus::all()->count() >= count($project_statuses)) {
            return false;
        }
        // -------------------------------------
        foreach ($project_statuses as $project_status) {
            $new_type = new ProjectStatus();
            $new_type->create($project_status);
        }
        return true;
    }
}
