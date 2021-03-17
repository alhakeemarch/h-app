<?php

namespace App\Http\Controllers;

use App\Organization;
use App\OrganizationType;
use Dotenv\Result\Success;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organization.index')->with(['organizations' => Organization::all()->reverse()]);
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('organization.create')->with([
            'organization_types' => OrganizationType::all(),
            'comming_from' => ($request->comming_from) ? $request->comming_from : false,
            'organization' => new Organization,
        ]);
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->is_has_organization_no($request)) {
            return redirect()->back()->withErrors([
                'One of organization numbers field must be provided', 'يجب توفير أحد حقول أرقام المؤسسة على الأقل'
            ]);
        }
        $valid_data = $request->validate([
            'organization_type_id' => 'nullable|numeric',
            'name_ar' => 'nullable|string',
            'name_en' => 'nullable|string',
            'unified_code' => 'nullable|string',
            'license_number' => 'nullable|string',
            'commercial_registration_no' => 'nullable|string',
            'special_code' => 'nullable|string',
        ]);
        $valid_data['created_by_id'] = auth()->user()->id;
        $found_organization = (new Organization)->find_organization($valid_data);
        if ($found_organization) {
            return redirect()->back()
                ->withErrors(['this orgnization allredy exsist', 'هذه المنشأة مسجلة مسبقاً']);
        }
        $organization =  Organization::create($valid_data);
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'organizations',
            'model' => 'organization',
            'model_id' => $organization->id,
            'action' => 'create',
            'description' => 'new organization created with id =>' . $organization->id,
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        if ($request->coming_from == 'create_new_project') {
            return view('project.forms.check_plot_no')->with([
                'organization' => $organization,
                'organization_types' => OrganizationType::all(),
                'success' => ['organization created successfully', 'تم اضافة المنشأة بنجاح'],
            ]);
        }
        // -----------------------------------------------------------------
        return redirect()->route('organization.show', $organization)->withSuccess(['organization created successfully', 'تم اضافة المنشأة بنجاح']);
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        // return 'hi';
        return view('organization.show')->with(['organization' => $organization]);
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('organization.edit')->with([
            'organization' => $organization,
            'organization_types' => OrganizationType::all(),
        ]);
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $valid_data = $request->validate([
            'organization_type_id' => 'nullable|numeric',
            'unified_code' => 'nullable|string',
            'license_number' => 'nullable|string',
            'commercial_registration_no' => 'nullable|string',
            'special_code' => 'nullable|string',
            'name_ar' => 'nullable|string',
            'name_en' => 'nullable|string',
            'owner_name' => 'nullable|string',
            'owner_national_id' => 'nullable|numeric',
            'authorised_person_name' => 'nullable|string',
            'headquarter' => 'nullable|string',
            'issue_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'issue_place' => 'nullable|string',
            'is_primary_commercial_registration' => 'nullable|boolean',
            'chamber_of_commerce_id' => 'nullable|string',
            'VAT_account_no' => 'nullable|numeric',
            'invoice_address_ar' => 'nullable|string',
            'invoice_address_en' => 'nullable|string',
            'POBox_no' => 'nullable|numeric',
            'zip_code' => 'nullable|numeric',
            'main_phone' => 'nullable|numeric',
            'fax_no' => 'nullable|numeric',
            'notes' => 'nullable|string',
            'private_notes' => 'nullable|string',
        ]);
        $valid_data['last_edit_by_id'] = auth()->user()->id;
        $organization->update($valid_data);
        return redirect()->route('organization.show', $organization->id)
            ->withSuccess(['organization Edited successfully', 'تم تعديل بيانات المنشأة بنجاح']);
        // return 'this is Organization update';
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        return 'this is Organization destroy';
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    private function is_has_organization_no(Request $request)
    {
        $has_organization_no = false;
        $has_organization_no = ($request->unified_code) ? true : $has_organization_no;
        $has_organization_no = ($request->license_number) ? true : $has_organization_no;
        $has_organization_no = ($request->commercial_registration_no) ? true : $has_organization_no;
        $has_organization_no = ($request->special_code) ? true : $has_organization_no;
        return $has_organization_no;
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
}
