<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\Contract;
use App\ContractType;
use App\MunicipalityBranch;
use App\Neighbor;
use App\OwnerType;
use App\Person;
use App\PersonTitles;
use App\Plan;
use App\Plot;
use App\Project;
use App\ProjectStatus;
use App\Rules\ValidDate;
use App\Rules\ValidHijriDate;
use App\Street;
// use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;





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
        $person = Person::findOrFail($request['person']);
        $employees = $person->all()->where('job_level', '>=', 5)->reverse();
        $plot = Plot::findOrFail($request['plot']);
        // return $plot;
        $project = new Project;
        $found_project = $project->where('plot_id', $plot->id)->first();
        $project = ($found_project) ? $found_project : $project;
        $formsData = array_merge(PlotController::formsData(), [
            'new_deed_no' => $plot->deed_no,
            'plot' => $plot,
            'project' => $project,
            'person' => $person,
            'employees' => $employees,
            'is_read_only' => true,
        ]);
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

        $plot = Plot::where('deed_no', $request->deed_no)->first();
        $validated_project = collect($this->validate_project($request));
        $validated_plot = PlotController::validatePlot($request);
        // $validated_person = PersonController::validatePerson($request);
        // dd($validated_project, $validated_plot, $request->all());
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->user_name;
        if (!$created_by_id and !$created_by_name) {
            return abort(403);
        }
        $validated_project->put('created_by_id', $created_by_id);
        $validated_project->put('created_by_name', $created_by_name);
        $validated_project->put('plot_id', $plot->id);

        $project = Project::create($validated_project->all());
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
        // return $project_contracts;
        $project_team = $this->get_project_team($project);
        $contract = new Contract();
        $contract_types = ContractType::all();
        $quick_form_contracts = ContractController::get_quick_form_contracts();
        $project_docs = ProjectDocController::get_project_docs();
        $employees = Person::where('job_division', 'design')->get()->sortBy('ar_name1');

        // to remove contract that already added from the list
        foreach ($quick_form_contracts as $key => $value) {
            foreach ($project_contracts as $contract) {
                if ($contract->contract_type()->first()->name_ar == $value) {
                    unset($quick_form_contracts[$key]);
                }
            }
        }


        return view('project.show')->with([
            'project' => $project,
            'project_team' => $project_team,
            'contract' => $contract,
            'contract_types' => $contract_types,
            'quick_form_contracts' => $quick_form_contracts,
            'project_contracts' => $project_contracts,
            'project_docs' => $project_docs,
            'employees' => $employees,
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

        if ($request->from_project) {
            return view('project.forms.q_edit')->with([
                'project' => $project,
                'project_statuses' => ProjectStatus::all(),
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
        if ($request->form_action == 'update_project_number') {
            $project->project_no = $this->get_new_project_no();
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
            return redirect()->back()->with('success', 'project number has be assigned - تم اضافة رقم للمشروع');
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
        if ($request->form_action == 'add_customer_to_project') {
            $request->validate(['national_id' => 'required|numeric|starts_with:1,2|digits:10',]);
            $found_person = Person::where('national_id', $request->national_id)->first();
            if (!$found_person) {
                return redirect()->back()->withErrors(['Employee not regesterd', 'يجب تسجيل العميل أولا']);
            }
            $owner_name = $found_person->ar_name1 . ' ' . $found_person->ar_name2 . ' ' . $found_person->ar_name3
                . ' ' . $found_person->ar_name4 . ' ' . $found_person->ar_name5;
            $owner_name = str_replace('  ', ' ', $owner_name);
            $project->project_name_ar = $owner_name;
            $project->person_id = $found_person->id;
            $project->owner_national_id = $found_person->national_id;
            $project->owner_name_ar = $owner_name;
            $project->owner_main_mobile_no = $found_person->mobile;
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
                'description' => 'project id =>' . $project->id . ', binded to a customer id =>'  . $found_person->id,
            ];
            DbLogController::add_record($db_record_data);
            // -----------------------------------------------------------------
            return redirect()->back()->with('success', 'project binded to a customer successfully - تم ربط المشروع بالعميل بنجاح');
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
            $project->plot_id = $found_plot->id;
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
            $request->validate([
                'project_name_ar' => 'nullable|string',
                'project_arch_hight' => 'required|string',
                'project_type' => 'required|string',
                'project_str_hight' => 'required|string',
                'last_rokhsa_no' => 'nullable|string',
                'last_rokhsa_issue_date' => ['nullable', 'string', new ValidHijriDate],
                'project_status_id' => 'nullable|numeric',
            ]);
            if ($request->project_name_ar) {
                $project->project_name_ar = $request->project_name_ar;
            }
            $project->project_arch_hight = $request->project_arch_hight;
            $project->project_type = $request->project_type;
            $project->project_str_hight = $request->project_str_hight;
            $project->last_rokhsa_no = $request->last_rokhsa_no;
            $project->last_rokhsa_issue_date = $request->last_rokhsa_issue_date;
            $project->project_status_id = $request->project_status_id;
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
                'description' => 'project id =>' . $project->id . ', updated some of main info',
            ];
            DbLogController::add_record($db_record_data);
            // -----------------------------------------------------------------
            return redirect()->route('project.show', $project)->with('success', 'project info updated successfully - تم التعديل  بنجاح');
        }
        // ------------------------------------------------------------------------------------------------------------------------------------- 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $plot = Plot::where('project_id', $project->id)->first();
        $plot->project_id = null;
        $plot->save();
        $project->delete();
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

    public function new_project(Request $request)
    {
        Gate::authorize('create', Project::class);


        // step 1 to check if the customer is already registered
        if (!($request->has('_token'))) {
            return view('project.forms.check_n_id');
        }
        // if ($request->method() === "GET") {
        //     return view('project.forms.check_n_id');
        // }
        $person = new Person;
        // step 2 to check if the customer is already registered
        if ($request->check_n_id_form) {
            $request->validate([
                'national_id' => 'required|numeric|starts_with:1,2|digits:10',
            ]);
            $found_person = $person->where('national_id', $request->national_id)->first();
            if (!$found_person) {
                return view('project.forms.create_person')->with([
                    'person_titles' => PersonTitles::all(),
                    'national_id' => $request->national_id,
                    'person' => $person,
                ]);
            } else {
                return view('project.forms.check_plot_no')->with([
                    'person' => $found_person,
                ]);
            }
        }
        // step 3 to regester new customer 
        if ($request->create_person) {
            $validatedData = collect(PersonController::validatePerson($request));
            $nationality = Country::where('code_2chracters', $validatedData['nationality_code'])->first();
            if ($nationality) {
                $validatedData->put('nationality_ar', $nationality->ar_name);
                $validatedData->put('nationality_en', $nationality->en_name);
            }
            $created_by_id = auth()->user()->id;
            $created_by_name = auth()->user()->user_name;
            if (!$created_by_id and !$created_by_name) {
                return abort(403);
            }
            $validatedData->put('created_by_id', $created_by_id);
            $validatedData->put('created_by_name', $created_by_name);
            $validatedData->put('is_customer', true);

            $person = $person->create($validatedData->all());
            $person->save();
            // -----------------------------------------------------------------
            // add record to db_log
            $db_record_data = [
                'table' => 'people',
                'model' => 'Person',
                'model_id' => $person->id,
                'action' => 'create',
                'description' => 'new person as customer created national_id =>'  . $person->national_id,
            ];
            DbLogController::add_record($db_record_data);
            // -----------------------------------------------------------------
            return view('project.forms.check_plot_no')->with([
                'person' => $person,
            ]);
        }
        // step 4 to check if the plot is already registered
        if ($request->check_deed_form) {
            $request->validate([
                'deed_no' => 'required',
            ]);
            $found_plot = Plot::where('deed_no', $request->deed_no)->first();
            $found_person = $person->where('national_id', $request->national_id)->first();

            if (!$found_plot) {
                $formsData = array_merge(PlotController::formsData(), [
                    'new_deed_no' => $request->deed_no,
                    'plot' => new Plot,
                    'project' => new Project,
                    'person' => $found_person,
                ]);
                return view('project.forms.create_plot')->with($formsData);
            } else {
                return redirect()->route('project.create', [
                    'person' => $found_person,
                    'plot' => $found_plot,
                ]);
            }
        }
        // step 5 to create a new plot
        if ($request->create_plot) {
            $found_person = $person->where('national_id', $request->national_id)->first();
            $validatedData = (PlotController::validatePlot($request));
            $created_by_id = auth()->user()->id;
            $created_by_name = auth()->user()->user_name;
            if (!$created_by_id and !$created_by_name) {
                return abort(403);
            }
            if (!(isset($validatedData['deed_issue_place']))) {
                $validatedData['deed_issue_place'] = 'كتابة عدل';
            }
            $validatedData['created_by_id'] = $created_by_id;
            $validatedData['created_by_name'] =  $created_by_name;
            $plot = Plot::create($validatedData);
            // -----------------------------------------------------------------
            // add record to db_log
            $db_record_data = [
                'table' => 'plots',
                'model' => 'plot',
                'model_id' => $plot->id,
                'action' => 'create',
                'description' => 'new plot created plot_no =>' . $plot->plot_no . ', deed_no =>'  . $plot->deed_no,
            ];
            DbLogController::add_record($db_record_data);
            // -----------------------------------------------------------------
            return redirect()->route('project.create', [
                'person' => $found_person,
                'plot' => $plot,
            ]);
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function contracts(Request $request)
    {
        #
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
    public function get_new_project_no()
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
            'project_name_ar' => 'string|required', // required
            'project_name_en' => 'string|nullable',
            'person_id' => 'numeric|required',
            // ----------------------------------------------------
            'owner_id' => 'numeric|nullable',
            'owner_national_id' => 'numeric|starts_with:1,2|digits:10|nullable',
            'owner_type' => ['nullable', 'string', //new ValidGregorianDate
            ],
            'owner_name_ar' => 'string|required', // required
            'owner_name_en' => 'string|nullable',
            'owner_main_mobile_no' => 'numeric|starts_with:0,9|digits:10,12,14|required', // required
            'extra_owners_list' => 'string|nullable',
            'extra_owners_info' => 'string|nullable',
            // ----------------------------------------------------
            'representative_id' => 'numeric|nullable',
            'representative_id' => 'numeric|nullable',
            'representative_type' => ['nullable', 'string', //new ValidGregorianDate
            ], // وكيل شرعي - مفوض - ناظر الوقف - ولي على قصر - 
            'representative_name_ar' => 'string|nullable',
            'representative_name_en' => 'string|nullable',
            'representative_main_mobile_no' => 'numeric|starts_with:0,9|digits:10,12,14|nullable',
            'representative_main_mobile_no' => 'numeric|starts_with:0,9|digits:10,12,14|nullable',
            'representative_authorization_type' => ['nullable', 'string', //new ValidGregorianDate
            ], // وكالة - تفويض - صط نظارة - صك ولاية
            'representative_authorization_no' => 'string|nullable',
            'representative_authorization_issue_date' => ['nullable', 'string', new ValidDate],
            'representative_authorization_issue_place' => 'string|nullable',
            'representative_authorization_expire_date' => ['nullable', 'string', new ValidDate],
            'extra_representatives_list' => 'string|nullable',
            // ----------------------------------------------------
            'project_status' => 'string|nullable',
            'project_type' => 'string|nullable',
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
        $all_projects = \App\Data\Projects_arr::git_projects();

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

}
