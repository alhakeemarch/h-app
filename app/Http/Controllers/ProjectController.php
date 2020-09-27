<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\FileSpecialty;
use App\MunicipalityBranch;
use App\Neighbor;
use App\OwnerType;
use App\Person;
use App\Plan;
use App\Plot;
use App\Project;
use App\Rules\ValidDate;
use App\Rules\ValidFileSize;
use App\Rules\ValidFileType;
use App\Street;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Strong;

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
        if (!auth()->user()->is_admin) {
            return redirect()->action(
                'FileAndFolderController@runningProjects'
            );
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
        $employees = $person->all()->where('is_employee', true)->reverse();
        $plot = Plot::findOrFail($request['plot']);
        // return $plot;
        $project = new Project;
        $found_project = $project->where('plot_id', $plot->plot_id)->first();
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
        // project_manager_id 

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
        $plot->project_id = $project->id;
        $plot->save();
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
        // return $project->plot->deed_date;
        // $a = $project->plot->deed_date;
        // dd($project->plot->deed_date);
        return view('project.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
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
        //
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
            $validatedData = collect(PlotController::validatePlot($request));
            $created_by_id = auth()->user()->id;
            $created_by_name = auth()->user()->user_name;
            if (!$created_by_id and !$created_by_name) {
                return abort(403);
            }
            $validatedData->put('created_by_id', $created_by_id);
            $validatedData->put('created_by_name', $created_by_name);
            $plot = Plot::create($validatedData->all());
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
    public static function validate_project(Request $request)
    {
        return $request->validate([
            'project_no' => 'unique:projects|nullable',
            'project_name_ar' => 'string|required', // required
            'project_name_en' => 'string|nullable',
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
            'project_manager_id' => 'numeric|nullable',
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
}
