<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\Contract;
use App\ContractType;
use App\Invoice;
use App\MunicipalityBranch;
use App\Neighbor;
use App\Organization;
use App\OrganizationType;
use App\OwnerType;
use App\Person;
use App\PersonTitles;
use App\Plan;
use App\Plot;
use App\Project;
use App\ProjectBeneficiary;
use App\ProjectDocType;
use App\ProjectService;
use App\ProjectStatus;
use App\RepresentativeType;
use App\Rules\ValidDate;
use App\Rules\ValidHijriDate;
use App\Street;
// use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

use function PHPSTORM_META\map;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('active_user');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->is_admin) {
            // $allProjectsCount = Project::all()->count();
            // $allProjects = Project::orderBy('id', 'desc')->paginate(300);
        } else {
            // $allProjects = Project::whereNotNull('project_manager_id')->paginate(300);
            // $allProjectsCount = 30;
        }

        $allProjectsCount = Project::all()->count();
        $allProjects = Project::orderBy('id', 'desc')->paginate(300);
        return view('project.index')->with([
            'projects' => $allProjects,
            'allProjectsCount' => $allProjectsCount,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Gate::authorize('create', Project::class);

        # 1 --> first page
        if (!$request->form_action) {
            return view('project.forms.check_n_id');
        }
        # 2 -->
        if ($request->form_action == 'check_n_id') {
            return $this->check_n_id($request);
        }
        # 3 -->
        if ($request->form_action == 'check_organization_id') {
            return $this->check_organization_id($request);
        }
        # 5 -->
        if ($request->form_action == 'create_new_custorm') {
            $customer = (new PersonController)->store($request);
            return view('project.forms.check_plot_no')->with([
                'person' => $customer,
            ]);
        }
        # 6 -->
        if ($request->form_action == 'check_deed_number') {
            return $this->check_deed_number($request);
        }
        # 7 -->
        if ($request->form_action == 'create_new_plot') {
            $person = ($request->owner_national_id) ? Person::where('national_id', $request->owner_national_id)->first() : false;
            $organization = ($request->organization_id) ? Organization::where('id', $request->organization_id)->first() : false;
            $plot = (new PlotController)->store($request);
            return $this->show_create_project_form($person, $organization, $plot);
        }

        return 'create function in project Controllere';
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function show_create_project_form($person, $organization, $plot)
    {
        $employees = Person::all()->where('job_level', '>=', 5)->reverse();
        $project = new Project;
        $found_project = $project->where('plot_id', $plot->id)->first();
        $project = ($found_project) ? $found_project : $project;
        $formsData = array_merge(PlotController::formsData(), [
            'new_deed_no' => $plot->deed_no,
            'plot' => $plot,
            'project' => $project,
            'organization_types' => OrganizationType::all(),
            'employees' => $employees,
            'is_read_only' => true,
        ]);
        if ($person) $formsData = array_merge($formsData, ['person' => $person,]);
        if ($organization) $formsData = array_merge($formsData, ['organization' => $organization,]);
        return view('project.create')->with($formsData);
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
        // return $request;
        $plot = Plot::where('deed_no', $request->deed_no)->first();
        $validated_project = $this->validate_project($request);
        $current_date = DateAndTime::get_date_time_arr();
        $created_at_note = $current_date['hijri_month_name_ar'] . '-' . $current_date['hijri_year_no'];
        if ($request->person_id) $validated_project['owner_id'] = $request->person_id;
        $validated_project['created_at_note'] = $created_at_note;
        $validated_project['created_by_id'] = auth()->user()->id;
        $validated_project['created_by_name'] = auth()->user()->user_name;
        $validated_project['plot_id'] = $plot->id;
        $validated_project['project_location'] = $this->get_project_location($plot);
        if ($request->organization_id) {
            $validated_project['project_name_ar'] =
                $validated_project['owner_name_ar'] =
                Organization::find($request->organization_id)->name_ar;
        }

        $project = Project::create($validated_project);
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'projects',
            'model' => 'Project',
            'model_id' => $project->id,
            'action' => 'create',
            'description' => 'new project created name =>'  . $project->project_name_ar  . ', plot_id = ' . $project->plot_id,
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------

        $plot->project_id = $project->id;
        $plot->save();
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'plots',
            'model' => 'Plot',
            'model_id' => $plot->id,
            'action' => 'update',
            'description' => 'set foreignID in plot table, plot_id = '  . $plot->id  . ', project_id = ' . $project->id,
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->action('ProjectController@show', $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Request $request)
    {
        $project_contracts = ContractController::get_project_contracts($project);
        $project_contracts_type_id = $project_contracts->map(function ($contract) {
            return $contract->contract_type_id;
        })->toArray();
        $project_team = $this->get_project_team($project);
        $contract = new Contract();
        $contract_types = ContractType::all()->sortBy('sorting');
        $quick_form_contracts = ContractType::where('is_in_quick_add', true)->orderBy('sorting')->get();
        $list_form_contracts = ContractType::where('is_in_quick_add', false)->whereNotNull('view_template')->orderBy('sorting')->get();
        if (auth()->user()->is_admin) {
            $list_form_contracts = ContractType::where('is_in_quick_add', false)->orderBy('sorting')->get();
        }
        $project_docs = ProjectDocType::where('is_in_quick_add', true)->get();
        $project_invoices = Invoice::where('project_id', $project->id)->get();
        $project_docs_list = ProjectDocType::whereNull('is_in_quick_add')->get();
        $employees = Person::where('job_division', 'design')->get()->sortBy('ar_name1');
        $project_services = ProjectService::where('project_id', $project->id)->get();
        $can_create_invoice = false;
        foreach ($project_contracts as $contract) {
            if (!isset($contract->invoice_id) && $contract->is_in_invoice) {
                $can_create_invoice = true;
            }
        }
        foreach ($project_services as $service) {
            if (!isset($service->invoice_id) && $service->is_in_invoice) {
                $can_create_invoice = true;
            }
        }

        // to remove contract that already added from the list
        foreach ($quick_form_contracts as $key => $value) {
            foreach ($project_contracts as $contract) {
                if ($contract->contract_type()->first()->name_ar == $value) {
                    unset($quick_form_contracts[$key]);
                }
            }
        }
        // to get project folders if exsest
        $project_folders = FileAndFolderController::get_project_folders($project);

        return view('project.show')->with([
            'project' => $project,
            'project_team' => $project_team,
            'contract' => $contract,
            'contract_types' => $contract_types,
            'quick_form_contracts' => $quick_form_contracts,
            'list_form_contracts' => $list_form_contracts,
            'project_contracts' => $project_contracts,
            'project_docs' => $project_docs,
            'project_docs_list' => $project_docs_list,
            'employees' => $employees,
            'project_contracts_type_id' => $project_contracts_type_id,
            'project_folders' => $project_folders,
            'project_invoices' => $project_invoices,
            'can_create_invoice' => $can_create_invoice,
            'project_services' => $project_services,
            'beneficiaries_list' => $this->get_project_beneficiaries($project),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Request $request)
    {
        if ($request->form_action == 'project_quick_edit') {
            return view('project.forms.q_edit')->with([
                'project' => $project,
                'project_statuses' => ProjectStatus::all(),
            ]);
        }
        // ----------------------------------------------------
        if ($request->form_action == 'show_edit_owner_info_form') {
            return view('project.forms.owners_form')->with([
                'project' => $project,
                'owner_types' => OwnerType::all(),
                'representative_types' => RepresentativeType::all(),
                'project_beneficiaries' => ProjectBeneficiaryController::get_project_beneficiaries($project),
            ]);
        }
        // ----------------------------------------------------
        if ($request->form_action == 'add_representative') {
            return view('project.forms.add_representative')->with([
                'project' => $project,
                'owner_types' => OwnerType::all(),
                'representative_types' => RepresentativeType::all(),
            ]);
        }
        // ----------------------------------------------------
        return view('project.edit')->with([
            'project' => $project,
            'owner_types' => OwnerType::all(),
            'municipality_branches' => MunicipalityBranch::all(),
            'neighbors' => Neighbor::all(),
            'plans' => Plan::all(),
            'districts' => District::all(),
            'streets' => Street::offset(0)->limit(10)->get(),
            'plots' => Plot::all()->reverse(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        Gate::authorize('create', Project::class);
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'update_project_location') {
            if (!$project->plot_id) {
                return redirect()->back()->withErrors([
                    'project must be linked to a plot first', 'يجب ربط المشروع بقطعة ارض أولاً'
                ]);
            }
            $plot = $project->plot()->first();
            $project->project_location = $this->get_project_location($plot);
            $project->save();
            return redirect()->back()->withSuccess(['project location updated', 'تم تحديث موقع المشروع']);
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'update_representative_info') {
            return $this->update_representative_info($request, $project);
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'add_representative_to_project') {
            return $this->add_representative_to_project($request, $project);
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'update_project_team_member') {
            $request->validate(
                [
                    'position' => 'string|required',
                    'member_id' => 'numeric|required',
                ]
            );
            $position = $request->position;
            $emp_id = $request->member_id;
            $project->$position = $emp_id;
            $project->last_edit_by_id = auth()->user()->id;
            $project->last_edit_by_name = auth()->user()->user_name;
            $project->save();
            return redirect()->back()->with('success', 'team member added successfully - تم اضافة الموظف بنجاح');
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'update_project_str_hight') {
            $request->validate(['str_hight' => 'string|required',]);
            $project->project_str_hight = $request->str_hight;
            $project->last_edit_by_id = auth()->user()->id;
            $project->last_edit_by_name = auth()->user()->user_name;
            $project->save();
            return redirect()->back()->with('success', 'structural hight added successfully - تم اضافة الإرتفاع الإنشائي بنجاح');
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'giv_project_a_number') {
            if ($project->is_only_supervision) {
                return redirect()->back()->withErrors([
                    'cannot give number to this project because it is only supervision', 'لايمكن اعطاء المشروع رقم لأنه إشراف فقط'
                ]);
            }
            $msg = self::giv_project_a_number($project);
            return redirect()->back()->with('success', $msg);
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'add_customer_to_project' || $request->form_action == 'change_owner_info') {
            return $this->update_owner_info($request, $project);
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'add_plot_to_project') {
            $request->validate(['deed_no' => 'required|string']);
            $found_plot = Plot::where('deed_no', $request->deed_no)->first();
            if (!$found_plot) {
                return redirect()->back()->withErrors(['Plot not regesterd', 'يجب تسجيل قطعة الأرض أولا']);
            }
            if ($found_plot->project_id) {
                return redirect()->back()->withErrors(['Plot regesterd to other project', 'قطعة الأرض مسجلة لمشروع آخر']);
            }
            // -----------------------------------------------------------------
            $found_plot->project_id = $project->id;
            $found_plot->save();
            // -----------------------------------------------------------------
            $project->plot_id = $found_plot->id;
            $project->$this->get_project_location($found_plot);
            $project->last_edit_by_id = auth()->user()->id;
            $project->last_edit_by_name = auth()->user()->user_name;
            $project->save();
            // -----------------------------------------------------------------
            // add record to db_log
            $db_record_data = [
                'table' => 'projects',
                'model' => 'Project',
                'model_id' => $project->id,
                'action' => 'update',
                'description' => 'project id =>' . $project->id . ', binded to a plot id =>'  . $found_plot->id,
            ];
            DbLogController::add_record($db_record_data);
            // -----------------------------------------------------------------
            return redirect()->back()->with('success', 'project binded to a customer successfully - تم ربط المشروع بالعميل بنجاح');
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'update_project_main_info') {
            return $this->update_project_main_info($request, $project);
        }
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    private function check_n_id($request)
    {
        $request->validate([
            'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        ]);
        $found_person = Person::where('national_id', $request->national_id)->first();
        if (!$found_person) {
            return view('project.forms.create_person')->with([
                'person_titles' => PersonTitles::all(),
                'national_id' => $request->national_id,
                'person' => new Person,
            ]);
        } else {
            return view('project.forms.check_plot_no')->with([
                'person' => $found_person,
            ]);
        }
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    private function check_organization_id($request)
    {
        $request->validate([
            'organization_id' => 'required',
        ]);

        $found_organization = Organization::where('commercial_registration_no', $request->organization_id)->first();
        if (!$found_organization) {
            $found_organization = Organization::where('unified_code', $request->organization_id)->first();
        }
        if (!$found_organization) {
            $found_organization = Organization::where('license_number', $request->organization_id)->first();
        }
        if (!$found_organization) {
            $found_organization = Organization::where('special_code', $request->organization_id)->first();
        }


        if (!$found_organization) {
            return redirect()->action(
                [OrganizationController::class, 'create'],
                ['comming_from' => 'create_new_project']
            );
        } else {
            return view('project.forms.check_plot_no')->with([
                'organization' => $found_organization,
                'organization_types' => OrganizationType::all(),
            ]);
        }
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    private function check_deed_number($request)
    {
        $request->validate([
            'deed_no' => 'required',
        ]);
        $found_plot = Plot::where('deed_no', $request->deed_no)->first();
        $found_person = (isset($request->national_id)) ? Person::where('national_id', $request->national_id)->first() : false;
        $found_organization = (isset($request->organization_id)) ? Organization::where('id', $request->organization_id)->first() : false;

        if (!$found_plot) {
            $formsData = array_merge(PlotController::formsData(), [
                'new_deed_no' => $request->deed_no,
                'plot' => new Plot,
                'project' => new Project,
                'person' => $found_person,
                'organization' => $found_organization,
                'organization_types' => OrganizationType::all(),
            ]);
            return view('project.forms.create_plot')->with($formsData);
        } else {
            return $this->show_create_project_form($found_person, $found_organization, $found_plot);
        }
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    public static function giv_project_a_number(Project $project)
    {
        if ($project->is_only_supervision) {
            return ['cannot give number to this project because it is only supervision', 'لايمكن اعطاء المشروع رقم لأنه إشراف فقط'];
        }
        $project->project_no = (new self)->get_new_project_no();
        $current_date = DateAndTime::get_date_time_arr();
        $created_at_note = $current_date['hijri_month_name_ar'] . '-' . $current_date['hijri_year_no'];
        $project->created_at_note = $created_at_note;
        $project->project_status_id = 3;
        $project->last_edit_by_id = auth()->user()->id;
        $project->last_edit_by_name = auth()->user()->user_name;
        $project->save();
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'projects',
            'model' => 'Project',
            'model_id' => $project->id,
            'action' => 'update',
            'description' => 'project id =>' . $project->id . ', given a number =>'  . $project->project_no,
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        $msg = FileAndFolderController::create_dir_in_running_project($project);
        // -----------------------------------------------------------------
        return [$msg, 'project number has be assigned', 'تم اضافة رقم للمشروع'];
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    public function update_owner_info($request, $project)
    {
        $old_record = $project->get_record_as_str();
        // ----------------------------------------------------------------- 
        $found_person = false;
        $found_organization = false;
        // ----------------------------------------------------------------- 
        if (in_array($request->owner_type_id, [1, 2, 3])) {
            $request->validate([
                'owner_national_id' => 'required|numeric|starts_with:1,2|digits:10',
                'owner_type_id' => 'required',
            ]);
            $found_person = Person::where('national_id', $request->owner_national_id)->first();
            if (!$found_person) {
                return redirect()->back()->withErrors(['Employee not regesterd', 'يجب تسجيل العميل أولا']);
            }
        }
        // ----------------------------------------------------------------- 
        if (!(in_array($request->owner_type_id, [1, 2, 3]))) {
            $request->validate([
                'owner_national_id' => 'required|string',
                'owner_type_id' => 'required',
            ]);
            $found_organization = (new Organization)->find_organization($request->owner_national_id);
            if (!$found_organization) {
                return redirect()->back()->withErrors(['Organization not regesterd', 'يجب تسجيل المنشأة أولا']);
            }
        }
        // ----------------------------------------------------------------- 
        if ($found_person) {
            $project->organization_id = null;
            $owner_name = $found_person->get_full_name_ar();
            if (!$project->project_name_ar) $project->project_name_ar = $owner_name;
            $project->owner_type_id = $request->owner_type_id;
            $project->person_id = $found_person->id;
            $project->owner_national_id = $found_person->national_id;
            $project->owner_name_ar = $owner_name;
            $project->owner_main_mobile_no = $found_person->mobile;
            $project->last_edit_by_id = auth()->user()->id;
            $project->last_edit_by_name = auth()->user()->user_name;
            $project->save();
            $new_record = $project->get_record_as_str();
            $new_customer_id = $found_person->id;
        }
        // ----------------------------------------------------------------- 
        if ($found_organization) {
            $project->person_id = null;
            $project->owner_national_id = null;
            $project->owner_main_mobile_no = null;
            if (!$project->project_name_ar) $project->project_name_ar = $found_organization->name_ar;
            $project->owner_type_id = $request->owner_type_id;
            $project->organization_id = $found_organization->id;
            $project->owner_name_ar = $found_organization->name_ar;
            $project->last_edit_by_id = auth()->user()->id;
            $project->last_edit_by_name = auth()->user()->user_name;
            $project->save();
            $new_record = $project->get_record_as_str();
            $new_customer_id = '(organization)' . $found_organization->id;
        }
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'projects',
            'model' => 'Project',
            'model_id' => $project->id,
            'action' => 'update',
            'notes' => $old_record . 'changed to' . $new_record,
            'description' => 'project id =>' . $project->id . ', updated to a customer id =>'  . $new_customer_id,
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->back()->with('success', 'owner info updated successfully - تم تحديث بيانات العميل بنجاح');
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    public function update_project_main_info($request, $project)
    {
        $old_record = $project->get_record_as_str();
        $valid_data = $request->validate([
            'project_name_ar' => 'nullable|string',
            'project_arch_hight' => 'required|string',
            'project_type' => 'required|string',
            'is_only_supervision' => 'nullable|boolean',
            'project_str_hight' => 'nullable|string',
            'last_rokhsa_no' => 'nullable|string',
            'last_rokhsa_issue_date' => ['nullable', 'string', new ValidHijriDate],
            'qarar_masahe_no' => 'nullable|string',
            'qarar_masahe_issue_date' => ['nullable', 'string', new ValidHijriDate],
            'project_status_id' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

        $valid_data['notes'] = ($request->notes) ? $project->notes . ' | ' . $request->notes : $project->notes;
        $valid_data['last_edit_by_id'] = auth()->user()->id;
        $valid_data['last_edit_by_name'] = auth()->user()->user_name;
        $project->update($valid_data);
        $project->save();
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'projects',
            'model' => 'Project',
            'model_id' => $project->id,
            'action' => 'update',
            'old_record' => $old_record,
            'description' => 'project id =>' . $project->id . ', updated some of main info',
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->route('project.show', $project)->with('success', 'project info updated successfully - تم التعديل  بنجاح');
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    public function update_representative_info($request, $project)
    {
        $request->validate([
            'representative_type_id' => 'nullable|numeric',
            'representative_national_id' => 'required|numeric|starts_with:1,2|digits:10',
            'representative_id' => 'nullable|numeric',
            'representative_name_ar' => 'nullable|string',
            'representative_name_en' => 'nullable|string',
            'representative_main_mobile_no' => 'nullable|string',
            'representative_authorization_type' => 'nullable|string',
            'representative_authorization_no' => 'nullable|string',
            'representative_authorization_issue_date' => ['nullable', 'string', new ValidDate],
            'representative_authorization_expire_date' => ['nullable', 'string', new ValidDate],
            'extra_representatives_list' => 'nullable|string',
        ]);

        if (!($request->representative_id)) {
            $found_representative = Person::where('national_id', $request->representative_national_id)->first();
            if (!$found_representative) {
                return redirect()->back()->withErrors(['Employee not regesterd', 'يجب تسجيل العميل أولا']);
            }

            $project->representative_id = $found_representative->id;
            $project->representative_type_id = $request->representative_type_id;
            $project->last_edit_by_id = auth()->user()->id;
            $project->last_edit_by_name = auth()->user()->user_name;
            $project->save();
        } else {
            $project->representative_type_id = $request->representative_type_id;
            $project->representative_authorization_no = $request->representative_authorization_no;
            $project->representative_authorization_issue_place = $request->representative_authorization_issue_place;
            $project->representative_authorization_issue_date = $request->representative_authorization_issue_date;
            $project->representative_authorization_expire_date = $request->representative_authorization_expire_date;
            $project->last_edit_by_id = auth()->user()->id;
            $project->last_edit_by_name = auth()->user()->user_name;
            $project->save();
        }
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'projects',
            'model' => 'Project',
            'model_id' => $project->id,
            'action' => 'update',
            'description' => 'project id =>' . $project->id . ', updated representative info',
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->back()->with('success', 'project info updated successfully - تم التعديل  بنجاح');
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 
    private function add_representative_to_project($request, $project)
    {
        $valid_data = $request->validate([
            'national_id' => 'required|numeric',
            'representative_type_id' => 'required|numeric',
            'representative_authorization_no' => 'required|string',
            'representative_authorization_issue_date' => ['required', 'string'],
            'representative_authorization_issue_place' => 'required|string',
            'representative_authorization_expire_date' => ['nullable', 'string'],
        ]);
        if ($project->representative_id) {
            return redirect()->route('project.show', $project)->withErrors(['allredy have representative', 'يوجد ممثل لهذا المشروع مسبقاً']);
        }
        $found_person = Person::where('national_id', $request->national_id)->first();
        if (!$found_person) {
            return redirect()->back()->withErrors(['the representative must be registered as customer first', 'يجب تسجيل ممثل المؤسسة كعميل أولاً']);
        }
        $valid_data['representative_id'] = $found_person->id;
        $valid_data['last_edit_by_id'] = auth()->user()->id;
        $valid_data['last_edit_by_name'] = auth()->user()->user_name;

        $project->update($valid_data);
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'projects',
            'model' => 'Project',
            'model_id' => $project->id,
            'action' => 'update',
            'description' => 'project id =>' . $project->id . ', added representative ->person id => ' . $found_person->id,
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->route('project.show', $project)->withSuccess(['representative added', 'تم اضافة ممثل لهذا للمشروع']);
    }
    // ------------------------------------------------------------------------------------------------------------------------------------- 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        // -----------------------------------------------------------------
        $project_contracts = ContractController::get_project_contracts($project);
        if ($project_contracts->count() > 0) {
            return redirect()->back()->withErrors(
                ['canot delet because there are contracts for this porject', 'لا يمكن الحذف يوجد عقود لهذا المشروع']
            );
        }
        // -----------------------------------------------------------------
        if (!$request->form_action == 'delet_with_note') {
            return view('project.destroy')->with(['project' => $project]);
        }
        $request->validate([
            'note' => 'required|min:3|string'
        ]);
        // -----------------------------------------------------------------
        $project->notes .= ' | delete reason: ' . $request->note;
        $project->save();
        $plot = Plot::where('project_id', $project->id)->first();
        if ($plot) {
            $plot->project_id = null;
            $plot->save();
        }
        $project->delete();
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'projects',
            'model' => 'Project',
            'model_id' => $project->id,
            'action' => 'destroy',
            'description' => 'project id =>' . $project->id . ', soft deleted because ' . $request->note,
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->action('ProjectController@index');
    }

    public function check(Request $request, Project $project)
    {
        if ($request->method() === "GET") {
            return view('project.check');
        }
        // return $request;
        $validatedData = $request->validate([
            'national_id' => 'required|min:10',
            'deed_no' => 'required',
        ]);
        // return $validatedData;
        $person = new Person;
        $found_person = $person->where('national_id', $validatedData['national_id'])->first();
        // return $found_person;
        $plot = new Plot;
        $found_plot = $plot->where('deed_no', $validatedData['deed_no'])->first();
        // return $found_plot;
        // return [$found_plot, $found_person];
        $msg = false;
        if (!$found_person) {
            Session::flash('no_person');
            $msg = true;
            // return redirect()->back();
        } elseif (!$found_person->is_customer) {
            Session::flash('not_customer');
            $msg = true;
            // return redirect()->back();
        }
        if (!$found_plot) {
            Session::flash('no_plot');
            $msg = true;
        } elseif (!$found_plot->project_id == null) {
            Session::flash('plan_have_project');
            $request->session()->flash('project_id', $found_plot->project_id);

            $msg = true;
        }
        if ($msg) {

            return redirect()->back();
        }
        // return [$found_plot, $found_person];

        return redirect()->action(
            'ProjectController@create',
            ['person' => $found_person, 'plot' => $found_plot]
        );
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function search(Request $request)
    {
        if ($request->method() === "GET") {
            return redirect()->action('ProjectController@index');
        }
        $request->validate([
            'project_name' => 'required|string',
        ]);

        $project_name = $request['project_name'];
        // $all_projects = project::where('project_name_ar', 'LIKE',  "%$project_name%")->get(); // ما نقدر نعمل بيجنيشن
        $all_projects = project::where('project_name_ar', 'LIKE',  "%$project_name%");

        $allProjectsCount = $all_projects->count();
        $projects = $all_projects->paginate($allProjectsCount);

        return view('project.index')->with([
            'projects' => $projects,
            'allProjectsCount' => $allProjectsCount,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_project_team($project)
    {

        $project_tame = [
            'project_manager' => ($project->project_manager()->first())
                ? $project->project_manager()->first()->ar_name1 . ' '
                . $project->project_manager()->first()->ar_name2 . ' '
                . $project->project_manager()->first()->ar_name5
                : null,
            'project_coordinator' => ($project->project_coordinator()->first())
                ? $project->project_coordinator()->first()->ar_name1 . ' '
                . $project->project_coordinator()->first()->ar_name2 . ' '
                . $project->project_coordinator()->first()->ar_name5
                : null,
            'arch_designed_by' => ($project->arch_designed_by()->first())
                ? $project->arch_designed_by()->first()->ar_name1 . ' '
                . $project->arch_designed_by()->first()->ar_name2 . ' '
                . $project->arch_designed_by()->first()->ar_name5
                : null,
            'elevation_designed_by' => ($project->elevation_designed_by()->first())
                ? $project->elevation_designed_by()->first()->ar_name1 . ' '
                . $project->elevation_designed_by()->first()->ar_name2 . ' '
                . $project->elevation_designed_by()->first()->ar_name5
                : null,
            'str_designed_by' => ($project->str_designed_by()->first())
                ? $project->str_designed_by()->first()->ar_name1 . ' '
                . $project->str_designed_by()->first()->ar_name2 . ' '
                . $project->str_designed_by()->first()->ar_name5
                : null,
            'san_designed_by' => ($project->san_designed_by()->first())
                ? $project->san_designed_by()->first()->ar_name1 . ' '
                . $project->san_designed_by()->first()->ar_name2 . ' '
                . $project->san_designed_by()->first()->ar_name5
                : null,
            'elec_designed_by' => ($project->elec_designed_by()->first())
                ? $project->elec_designed_by()->first()->ar_name1 . ' '
                . $project->elec_designed_by()->first()->ar_name2 . ' '
                . $project->elec_designed_by()->first()->ar_name5
                : null,
            'fire_fighting_designed_by' => ($project->fire_fighting_designed_by()->first())
                ? $project->fire_fighting_designed_by()->first()->ar_name1 . ' '
                . $project->fire_fighting_designed_by()->first()->ar_name2 . ' '
                . $project->fire_fighting_designed_by()->first()->ar_name5
                : null,
            'fire_alarm_designed_by' => ($project->fire_alarm_designed_by()->first())
                ? $project->fire_alarm_designed_by()->first()->ar_name1 . ' '
                . $project->fire_alarm_designed_by()->first()->ar_name2 . ' '
                . $project->fire_alarm_designed_by()->first()->ar_name5
                : null,
            'fire_escape_designed_by' => ($project->fire_escape_designed_by()->first())
                ? $project->fire_escape_designed_by()->first()->ar_name1 . ' '
                . $project->fire_escape_designed_by()->first()->ar_name2 . ' '
                . $project->fire_escape_designed_by()->first()->ar_name5
                : null,
            'surveyed_by' => ($project->surveyed_by()->first())
                ? $project->surveyed_by()->first()->ar_name1 . ' '
                . $project->surveyed_by()->first()->ar_name2 . ' '
                . $project->surveyed_by()->first()->ar_name5
                : null,
            'main_draftsman' => ($project->main_draftsman()->first())
                ? $project->main_draftsman()->first()->ar_name1 . ' '
                . $project->main_draftsman()->first()->ar_name2 . ' '
                . $project->main_draftsman()->first()->ar_name5
                : null,
            'draftsman_1' => ($project->draftsman_1()->first())
                ? $project->draftsman_1()->first()->ar_name1 . ' '
                . $project->draftsman_1()->first()->ar_name2 . ' '
                . $project->draftsman_1()->first()->ar_name5
                : null,
            'draftsman_2' => ($project->draftsman_2()->first())
                ? $project->draftsman_2()->first()->ar_name1 . ' '
                . $project->draftsman_2()->first()->ar_name2 . ' '
                . $project->draftsman_2()->first()->ar_name5
                : null,
            'draftsman_3' => ($project->draftsman_3()->first())
                ? $project->draftsman_3()->first()->ar_name1 . ' '
                . $project->draftsman_3()->first()->ar_name2 . ' '
                . $project->draftsman_3()->first()->ar_name5
                : null,
            'draftsman_4' => ($project->draftsman_4()->first())
                ? $project->draftsman_4()->first()->ar_name1 . ' '
                . $project->draftsman_4()->first()->ar_name2 . ' '
                . $project->draftsman_4()->first()->ar_name5
                : null,
            'draftsman_5' => ($project->draftsman_5()->first())
                ? $project->draftsman_5()->first()->ar_name1 . ' '
                . $project->draftsman_5()->first()->ar_name2 . ' '
                . $project->draftsman_5()->first()->ar_name5
                : null,
            'draftsman_6' => ($project->draftsman_6()->first())
                ? $project->draftsman_6()->first()->ar_name1 . ' '
                . $project->draftsman_6()->first()->ar_name2 . ' '
                . $project->draftsman_6()->first()->ar_name5
                : null,
            'draftsman_7' => ($project->draftsman_7()->first())
                ? $project->draftsman_7()->first()->ar_name1 . ' '
                . $project->draftsman_7()->first()->ar_name2 . ' '
                . $project->draftsman_7()->first()->ar_name5
                : null,
            'draftsman_8' => ($project->draftsman_8()->first())
                ? $project->draftsman_8()->first()->ar_name1 . ' '
                . $project->draftsman_8()->first()->ar_name2 . ' '
                . $project->draftsman_8()->first()->ar_name5
                : null,
            'draftsman_9' => ($project->draftsman_9()->first())
                ? $project->draftsman_9()->first()->ar_name1 . ' '
                . $project->draftsman_9()->first()->ar_name2 . ' '
                . $project->draftsman_9()->first()->ar_name5
                : null,
        ];

        return $project_tame;
    }
    // -----------------------------------------------------------------------------------------------------------------
    private function get_new_project_no()
    {
        $all_project_no = Project::all(['project_no'])->toArray();
        $project_no_arr = [];
        $contrer = 1;
        $avalable_no = [];
        foreach ($all_project_no as $value) {
            if ($value['project_no'] == null) {
            } elseif (is_integer((int)(Str::before($value['project_no'], '_')))) {
                array_push($project_no_arr, (int) (Str::before($value['project_no'], '_')));
            }
        }
        sort($project_no_arr);
        foreach ($project_no_arr as $number) {
            if (!(in_array($contrer, $project_no_arr))) {
                array_push($avalable_no, $contrer);
            }
            $contrer++;
        }
        if (count($avalable_no) > 0) {
            return $avalable_no[0];
        } else {
            return max($project_no_arr) + 1;
        }

        // exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function validate_project(Request $request)
    {
        return $request->validate([
            'project_no' => 'unique:projects|nullable',
            'project_name_ar' => 'string|required_without:organization_id', // required
            'project_name_en' => 'string|nullable',
            'person_id' => 'numeric|required_without:organization_id',
            'organization_id' => 'string|required_without:person_id',
            // 'organization_id' => 'string|required_if:person_id',
            // ----------------------------------------------------
            'owner_id' => 'numeric|nullable',
            'owner_national_id' => 'numeric|starts_with:1,2|digits:10|nullable',
            'owner_type' => [
                'nullable', 'string', //new ValidGregorianDate
            ],
            'owner_name_ar' => 'string|required_without:organization_id', // required
            'owner_name_en' => 'string|nullable',
            'owner_main_mobile_no' => 'numeric|starts_with:0,9|digits:10,12,14|required_without:organization_id', // required
            'extra_owners_list' => 'string|nullable',
            'extra_owners_info' => 'string|nullable',
            // ----------------------------------------------------
            'representative_id' => 'numeric|nullable',
            'representative_id' => 'numeric|nullable',
            'representative_type' => [
                'nullable', 'string', //new ValidGregorianDate
            ], // وكيل شرعي - مفوض - ناظر الوقف - ولي على قصر - 
            'representative_name_ar' => 'string|nullable',
            'representative_name_en' => 'string|nullable',
            'representative_main_mobile_no' => 'numeric|starts_with:0,9|digits:10,12,14|nullable',
            'representative_main_mobile_no' => 'numeric|starts_with:0,9|digits:10,12,14|nullable',
            'representative_authorization_type' => [
                'nullable', 'string', //new ValidGregorianDate
            ], // وكالة - تفويض - صط نظارة - صك ولاية
            'representative_authorization_no' => 'string|nullable',
            'representative_authorization_issue_date' => ['nullable', 'string', new ValidDate],
            'representative_authorization_issue_place' => 'string|nullable',
            'representative_authorization_expire_date' => ['nullable', 'string', new ValidDate],
            'extra_representatives_list' => 'string|nullable',
            // ----------------------------------------------------
            'project_status' => 'string|nullable',
            'project_type' => 'string|nullable',
            'is_only_supervision' => 'nullable|boolean',
            'project_assign_to_user' => 'string|nullable',
            'project_arch_hight' => 'string|nullable',
            'project_str_hight' => 'string|nullable',
            // ----------------------------------------------------
            'byanat_almawqi_no' => 'string|nullable',
            'byanat_almawqi_issue_date' => ['nullable', 'string', new ValidDate],
            'qarar_masahe_no' => 'string|nullable',
            'qarar_masahe_issue_date' => ['nullable', 'string', new ValidDate],
            'tanzeem_plan_no' => 'string|nullable',
            'tanzeem_plan_issue_date' => ['nullable', 'string', new ValidDate],
            'old_rokhsa_no' => 'string|nullable',
            'old_rokhsa_issue_date' => ['nullable', 'string', new ValidDate],
            'last_rokhsa_no' => 'string|nullable',
            'last_rokhsa_issue_date' => ['nullable', 'string', new ValidDate],
            'other_doc_details' => 'string|nullable',
            // ----------------------------------------------------
            'project_manager_id' => 'numeric|nullable|required',
            'project_coordinator' => 'string|nullable',
            // ----------------------------------------------------
            'arch_designed_by' => 'string|nullable',
            'elevation_designed_by' => 'string|nullable',
            'str_designed_by' => 'string|nullable',
            'san_designed_by' => 'string|nullable',
            'elec_designed_by' => 'string|nullable',
            'fire_fighting_designed_by' => 'string|nullable',
            'fire_alarm_designed_by' => 'string|nullable',
            'fire_escape_designed_by' => 'string|nullable',
            'tourism_designed_by' => 'string|nullable',
            'interior_designed_by' => 'string|nullable',
            'landscape_designed_by' => 'string|nullable',
            'surveyed_by' => 'string|nullable',
            // ----------------------------------------------------
            'main_draftsman' => 'string|nullable',
            'draftsman_1' => 'string|nullable',
            'draftsman_1_mission' => 'string|nullable',
            'draftsman_2' => 'string|nullable',
            'draftsman_2_mission' => 'string|nullable',
            'draftsman_3' => 'string|nullable',
            'draftsman_3_mission' => 'string|nullable',
            'draftsman_4' => 'string|nullable',
            'draftsman_4_mission' => 'string|nullable',
            'draftsman_5' => 'string|nullable',
            'draftsman_5_mission' => 'string|nullable',
            'draftsman_6' => 'string|nullable',
            'draftsman_6_mission' => 'string|nullable',
            'draftsman_7' => 'string|nullable',
            'draftsman_7_mission' => 'string|nullable',
            'draftsman_8' => 'string|nullable',
            'draftsman_8_mission' => 'string|nullable',
            'draftsman_9' => 'string|nullable',
            'draftsman_9_mission' => 'string|nullable',
            'extra_draftsman_details' => 'string|nullable',
            // ----------------------------------------------------
            'contracts_list_names' => 'string|nullable',
            'total_project_price' => 'numeric|nullable',
            'total_project_cost' => 'numeric|nullable',
            // ----------------------------------------------------
            // 'municipality_branche_id' => 'numeric|nullable', // cnceld in db
            // 'neighbor_id' => 'numeric|nullable', // cnceld in db
            // 'plan_id' => 'numeric|nullable', // cnceld in db
            // 'district_id' => 'numeric|nullable', // cnceld in db
            // 'street_id' => 'numeric|nullable', // cnceld in db
            'plot_id' => 'numeric|nullable', // 
            // 'plot_no' => 'string|nullable', // cnceld in db
            // 'deed_id' => 'numeric|nullable', // cnceld in db
            // 'deed_no' => 'unique:projects|string|nullable', // cnceld in db
            // 'total_area' => 'numeric|nullable', // cnceld in db
            'project_location' => 'string|nullable',
            // ----------------------------------------------------
            'notes' => 'string|nullable',
            'private_notes' => 'string|nullable',
            'created_at_note' => 'string|nullable',
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function firstInsertion()
    {
        // $all_projects = App\Data\Projects_arr::git_projects();
        $all_projects = [];

        if (Project::all()->count() >= count($all_projects)) {
            return false;
        }

        foreach ($all_projects as $project) {
            $new_project = new Project();

            foreach ($project as $key => $value) {
                if ($value && !($key == 'id')) {
                    if (strpos($key, 'old_exl') !== false) {
                        // echo $key . '=>' . $value . '<br>';
                        $new_project->notes = $new_project->notes . ' | ' . $key . '=>' . $value;
                    } else {
                        $new_project->$key = $value;
                    }
                }
            }
            $new_project->created_by_id = auth()->user()->id;
            $new_project->created_by_name = auth()->user()->user_name;
            $new_project->save();
        }
        return 'true';
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function added_projects()
    {
        $preoj = [
            [
                'id' => '1933',
                'project_no' => '1928',
                'project_name_ar' => 'عبدالله عبدالرزاق مصطفى اسلام',
                'project_type' => 'سكني',
                'old_exl_plot_no' => '1512',
                'project_location' => 'مخطط الإسكان 4350025/س',
                'created_at_note' => 'ذي الحجة 1441',
            ],
            [
                'id' => '1942',
                'project_no' => '1937',
                'project_name_ar' => 'مصطفى جميعان رجاء الله المرعشي',
                'project_type' => 'سكني تجاري',
                'old_exl_plot_no' => '143',
                'project_location' => 'العزيزية',
                'created_at_note' => 'ذي الحجة 1441',
            ],
            [
                'id' => '1944',
                'project_no' => '1939',
                'project_name_ar' => 'انفاق المنطقة المركزية',
                'project_type' => 'انفاق المنطقة المركزية',
                'project_location' => 'المنطقة المركزية',
                'created_at_note' => 'ذي الحجة 1441',
            ],
            [
                'id' => '1947',
                'project_no' => '1942',
                'project_name_ar' => 'غازي حسن محمد زيتوني',
                'project_type' => 'مبنى سكني',
                'old_exl_plot_no' => '256',
                'created_at_note' => 'ذي الحجة 1441',
                'old_exl_arch_designed_by' => 'اسلام عبد الواحد',
                'old_exl_main_draftsman' => 'نعمان شريف',
                'old_exl_deed_no' => '240108015857',
            ],
            [
                'id' => '1949',
                'project_no' => '1944',
                'project_name_ar' => 'مراد حسين محمد عسيري 3-1',
                'project_type' => 'سكني',
                'project_location' => 'حي طيبة',
                'old_exl_plot_no' => '3-1',
                'old_exl_arch_designed_by' => 'اسلام عبد الواحد',
                'created_at_note' => 'محرم 1442',
            ],
            [
                'id' => '1952',
                'project_no' => '1947',
                'project_name_ar' => 'مراد حسين محمد عسيري 3-2',
                'project_type' => 'سكني',
                'project_location' => 'حي طيبة',
                'old_exl_plot_no' => '3-2',
                'old_exl_arch_designed_by' => 'اسلام عبد الواحد',
                'created_at_note' => 'محرم 1442',
            ],
            [
                'id' => '1953',
                'project_no' => '1948',
                'project_name_ar' => 'ماجد عبدالله علي الصاعدي',
                'project_type' => 'سكني',
                'project_location' => 'شوران ر',
                'old_exl_plot_no' => '189',
                'created_at_note' => 'محرم 1442',
            ],
            [
                'id' => '1954',
                'project_no' => '1949',
                'project_name_ar' => 'عبدالله صالح سليم الحربي',
                'project_type' => 'دوبلكس',
                'project_location' => 'حي الجصة',
                'old_exl_plot_no' => '147-2',
                'old_exl_arch_designed_by' => 'اسلام عبد الواحد',
                'old_exl_main_draftsman' => 'حنفي مهنى',
                'old_exl_deed_no' => '1033810001',
                'created_at_note' => 'محرم 1442',
            ],
            [
                'id' => '1956',
                'project_no' => '1951',
                'project_name_ar' => 'هاني صالح سليم الحربي',
                'project_type' => 'دوبلكس',
                'project_location' => 'حي الجصة',
                'old_exl_plot_no' => '147-1',
                'old_exl_arch_designed_by' => 'اسلام عبد الواحد',
                'old_exl_main_draftsman' => 'حنفي مهنى',
                'old_exl_deed_no' => '540113006445',
                'created_at_note' => 'محرم 1442',
            ],
            [
                'id' => '1958',
                'project_no' => '1953',
                'project_name_ar' => 'رسلان احمد هاشم مجاهد',
                'old_exl_plot_no' => '5570',
                'project_type' => 'عمارة سكنية',
                'project_location' => 'العوالي الدويخلة',
                'old_exl_arch_designed_by' => 'احمد بكران',
                'old_exl_main_draftsman' => 'سيد ازهر',
                'created_at_note' => 'محرم 1442',
            ],
            [
                'id' => '1960',
                'project_no' => '1955',
                'project_name_ar' => 'عادل زكي ابو الفرج سفر - إبراهيم عويضة',
                'old_exl_plot_no' => '393 \ 2',
                'project_type' => 'تجاري اداري',
                'project_location' => 'ميطان مذينب',
                'old_exl_arch_designed_by' => 'اسلام عبد الواحد',
                'old_exl_main_draftsman' => 'حنفي مهنى',
                'created_at_note' => 'محرم 1442',
            ],
            [
                'id' => '1961',
                'project_no' => '1956',
                'project_name_ar' => 'عبدالله حامد حسن عبيد - 25-2',
                'old_exl_plot_no' => '25 / 2',
                'project_type' => 'عمارة + فيلا سكنية',
                'project_location' => 'الهجرة - شوران',
                'old_exl_arch_designed_by' => 'احمد بكران',
                'created_at_note' => 'صفر 1442',
            ],
            [
                'id' => '1962',
                'project_no' => '1957',
                'project_name_ar' => 'محمد سهل سليمان جمال',
                'project_type' => 'سكني',
                'project_location' => 'الهجرة - شوران',
                'old_exl_arch_designed_by' => 'احمد بكران',
                'created_at_note' => 'صفر 1442',
            ],
            [
                'id' => '1963',
                'project_no' => '1958',
                'project_name_ar' => 'معتز سهل سليمان جمال',
                'project_type' => 'سكني',
                'project_location' => 'الهجرة - شوران',
                'old_exl_arch_designed_by' => 'احمد بكران',
                'created_at_note' => 'صفر 1442',
            ],
            [
                'id' => '1966',
                'project_no' => '1961',
                'project_name_ar' => 'صالح محمد ناصر الزاحم',
                'old_exl_plot_no' => '41-2',
                'project_type' => 'فندق',
                'project_location' => 'الفتح - الراية',
                'old_exl_arch_designed_by' => 'عبدالعاطي عبدالحميد',
                'old_exl_main_draftsman' => 'عاطف الشربيني',
                'old_exl_str_designed_by' => 'عبدالله فهمي',
                'old_exl_deed_no' => '340107017473',
                'created_at_note' => 'صفر 1442',
            ],
        ];
        foreach ($preoj as $project) {
            $new_project = Project::findOrFail($project['id']);

            foreach ($project as $key => $value) {
                if ($value && !($key == 'id')) {
                    if (strpos($key, 'old_exl') !== false) {
                        $new_project->notes = $new_project->notes . ' | ' . $key . '=>' . $value;
                    } else {
                        $new_project->$key = $value;
                    }
                }
            }
            $new_project->last_edit_by_id = auth()->user()->id;
            $new_project->last_edit_by_name = auth()->user()->user_name;
            $new_project->save();
        }
        $all_empty_projects = Project::where('project_name_ar', 'empty_project_name')->get();
        foreach ($all_empty_projects as  $project) {
            $project->delete();
        }
        return 'deleted';
        return 'true';
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_all_projects_as_arr()
    {
        $all_projects = Project::all();
        foreach ($all_projects as $project) {
            $obj = json_decode($project, TRUE);
            echo '[';
            foreach ($obj as $a => $b) {
                if ($b) {
                    echo "'" . ($a) . "'=>'" . $b . "',";
                    echo '<br>';
                }
            }
            echo '],';
            echo '<br>';
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    private function get_project_location($plot)
    {
        $project_location = '';
        if ($plot->district_id) {
            $project_location = $plot->district->ar_name;
        }
        if ($plot->neighbor_id) {
            $project_location .= ' - ' . $plot->neighbor->ar_name;
        }
        return $project_location;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_project_beneficiaries($project)
    {
        $beneficiary_list = [];
        // project name
        array_push($beneficiary_list, ['value' => 'project_name_ar', 'name' => $project->project_name_ar]);
        // project owner
        if ($project->person_id) {
            array_push($beneficiary_list, [
                'value' => 'owner|person|' . $project->person_id,
                'name' => $project->person()->first()->get_full_name_ar()
            ]);
        }
        if ($project->organization_id) {
            array_push($beneficiary_list, [
                'value' => 'owner|organization|' . $project->organization_id,
                'name' => $project->organization()->first()->name_ar
            ]);
        }
        // project reprsintetive
        if ($project->representative_id) {
            array_push($beneficiary_list, [
                'value' => 'representative|person|' . $project->representative_id,
                'name' => $project->representative()->first()->get_full_name_ar()
            ]);
        }
        // project beneficiaries
        $beneficiaries = ProjectBeneficiaryController::get_project_beneficiaries($project);
        if (count($beneficiaries) > 0) {
            foreach ($beneficiaries as $beneficiary) {
                if ($beneficiary->person_id) {
                    array_push($beneficiary_list, [
                        'value' => 'beneficiary|person|' . $beneficiary->person_id,
                        'name' => Person::find($beneficiary->person_id)->get_full_name_ar()
                    ]);
                }
                if ($beneficiary->organization_id) {
                    array_push($beneficiary_list, [
                        'value' => 'beneficiary|organization|' . $beneficiary->organization_id,
                        'name' => Organization::find($beneficiary->organization_id)->name_ar
                    ]);
                }
            }
        }

        return $beneficiary_list;
    }
    // -----------------------------------------------------------------------------------------------------------------

}
