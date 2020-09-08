<?php

namespace App\Http\Controllers;

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
