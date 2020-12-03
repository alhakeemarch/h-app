<?php

namespace App\Http\Controllers;

use App\Organization;
use App\OrganizationType;
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
        //
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
            'organization_typs' => OrganizationType::all(),
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
            'organization_typ_id' => 'nullable|numeric',
            'name_ar' => 'nullable|string',
            'name_en' => 'nullable|string',
            'unified_code' => 'nullable|string',
            'license_number' => 'nullable|string',
            'commercial_registration_no' => 'nullable|string',
            'special_code' => 'nullable|string',
        ]);
        $valid_data['created_by_id'] = auth()->user()->id;
        return (new Organization)->find_organization($valid_data);
        $organization =  Organization::create($valid_data);
        // $organization->find_organization($valid_data);

        // dd($organization);
        // dd($valid_data);

        dd('i am stor ', $request->all());
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
        //
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
        //
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
        //
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
        //
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
