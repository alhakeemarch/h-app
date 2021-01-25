<?php

namespace App\Http\Controllers;

use App\Person;
use App\Project;
use App\Organization;
use App\ProjectBeneficiary;
use Illuminate\Http\Request;

class ProjectBeneficiaryController extends Controller
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
        $request->validate([
            'beneficiary_type' => 'required',
            'id' => 'required',
            'project_id' => 'required',
        ]);
        // -----------------------------------------------------------------
        $project = Project::find($request->project_id);
        if (!$project) return redirect()->back()->withErrors(['project not found!', 'مشروع غير موجود!']);
        // -----------------------------------------------------------------
        if ($request->beneficiary_type == 'person') {
            $person = Person::where('national_id', $request->id)->first();
            if (!$person) {
                return redirect()->back()->withErrors([
                    'person not found!',
                    'لا يوجد عميل برقم الهوية المدخل',
                    'يرجى التأكد من رقم الهوية أو تسجيل العميل أولاً'
                ]);
            }
            $project_beneficiary = new ProjectBeneficiary;
            $project_beneficiary->project_id = $project->id;
            $project_beneficiary->person_id = $person->id;
            if ($request->relation_to_project) $project_beneficiary->relation_to_project = $request->relation_to_project;
            $project_beneficiary->created_by_id = auth()->user()->id;
            $project_beneficiary->save();
            // -----------------------------------------------------------------
            // add record to db_log
            $db_record_data = [
                'table' => 'project_beneficiaries',
                'model' => 'ProjectBeneficiary',
                'model_id' => $project_beneficiary->id,
                'action' => 'create',
                'description' => 'person with id=>' . $person->id . ',added to project id =>' . $project->id . ', as beneficiary',
            ];
            DbLogController::add_record($db_record_data);
            return redirect()->back()->withSuccess(['beneficiary added to the project', 'تم إضافة مستفيد للمشروع']);
        }
        // -----------------------------------------------------------------
        // -----------------------------------------------------------------
        if ($request->beneficiary_type == 'organization') {
            $organization = (new Organization)->find_organization($request->id);
            if (!$organization) {
                return redirect()->back()->withErrors([
                    'organization not found!',
                    'لا يوجد منشأة بالرقم المدخل',
                    'يرجى التأكد الرقم أو تسجيل المنشأة أولاً'
                ]);
            }
            $project_beneficiary = new ProjectBeneficiary;
            $project_beneficiary->project_id = $project->id;
            $project_beneficiary->organization_id = $organization->id;
            if ($request->relation_to_project) $project_beneficiary->relation_to_project = $request->relation_to_project;
            $project_beneficiary->created_by_id = auth()->user()->id;
            $project_beneficiary->save();
            // -----------------------------------------------------------------
            // add record to db_log
            $db_record_data = [
                'table' => 'project_beneficiaries',
                'model' => 'ProjectBeneficiary',
                'model_id' => $project_beneficiary->id,
                'action' => 'create',
                'description' => 'organization with id=>' . $organization->id . ',added to project id =>' . $project->id . ', as beneficiary',
            ];
            DbLogController::add_record($db_record_data);
            return redirect()->back()->withSuccess(['beneficiary added to the project', 'تم إضافة مستفيد للمشروع']);
        }
        // -----------------------------------------------------------------
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectBeneficiary  $projectBeneficiary
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectBeneficiary $projectBeneficiary)
    {
        return $projectBeneficiary;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectBeneficiary  $projectBeneficiary
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectBeneficiary $projectBeneficiary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectBeneficiary  $projectBeneficiary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectBeneficiary $projectBeneficiary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectBeneficiary  $projectBeneficiary
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectBeneficiary $projectBeneficiary)
    {
        //
    }
    public static function get_project_beneficiaries($project)
    {
        $beneficiaries = ProjectBeneficiary::where('project_id', $project->id)->get();
        return $beneficiaries;
    }
}
