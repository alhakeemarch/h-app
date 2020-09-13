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
                'ProjectController@runningProjects'
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
        // return $request;
        $person = Person::where('id', $request->person_id)->first();
        $plot = Plot::where('id', $request->plot_id)->first();

        return view('project.create', [
            'person' => $person,
            'plot' => $plot,
        ]);
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
        return $request;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Request $request)
    {
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
        //
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
            ['person_id' => $found_person, 'plot_id' => $found_plot]
        );
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function new_project(Request $request)
    {
        // step 1 to check if the customer is already registered
        if ($request->method() === "GET") {
            return view('project.forms.check_n_id');
        }
        $person = new Person;
        // step 2 to 
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
        // step 3 to 
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
        // step 4 to 
        if ($request->check_deed_form) {
            $request->validate([
                'deed_no' => 'required',
            ]);
            $found_plot = Plot::where('deed_no', $request->deed_no)->first();
            $found_person = $person->where('national_id', $request->national_id)->first();
            // return $found_plot;
            if (!$found_plot) {
                return view('project.forms.create_plot')->with([
                    'new_deed_no' => $request->deed_no,
                    'plot' => new Plot,
                    'project' => new Project,
                    'person' => $found_person,
                ]);
            } else {
                return redirect()->route('project.contracts', [
                    'person' => $found_person,
                    'plot' => $found_plot,
                ]);
            }
        }
        // step 5 to 
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
            return redirect()->route('project.contracts', [
                'person' => $found_person,
                'plot' => $plot,
            ]);
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function contracts(Request $request)
    {
        $person = Person::findOrFail($request['person']);
        $plot = Plot::findOrFail($request['plot']);
        return view('project.contracts')->with([
            'person' => $person,
            'plot' => $plot,
        ]);
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
}
