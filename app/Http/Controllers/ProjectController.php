<?php

namespace App\Http\Controllers;

use App\Person;
use App\Plot;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request) {
        //     dd($request);
        //     return $request;
        // }

        $allProjects = Project::all();
        $runningProjects = $this->get_running_projects();
        $finishedProjects = $this->get_finished_projects();
        $e_archive = $this->get_e_archive();

        return view('project.index')->with([
            'projects' => $allProjects,
            'runningProjects' => $runningProjects,
            'finishedProjects' => $finishedProjects,
            'e_archive' => $e_archive,
        ]);
    }

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
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Request $request)
    {
        return 'Project show method';
        // dd( $request);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
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

    function get_running_projects()
    {
        $project_no = [];
        $project_name = [];

        $directory = '//100.0.0.5/f$/data-server/02-Runing-Projects';
        // $directory = 'D:/xampp/htdocs/h-app/test_fa/projects/01- running projects';
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $projects_dir = $scanned_directory;

        foreach ($projects_dir as $key => $value) {
            $n = substr($value, 1, 1);
            $n = trim($n);
            if (is_numeric($n)) {
                $position = stripos($value, '-');
                $sub = substr($value, 0, $position);
                $sub = trim($sub);
                $sub2 = substr($value, $position + 1);
                $sub2 = trim($sub2);
                $project_no[$sub] = $value;
                $project_name[$sub] = $sub2;
            } else {
                $project_name['لم يعطى رقم' . $key] = $value;
            }
        }
        ksort($project_no);
        ksort($project_name);

        // TO: check if there is a project missing
        // $a = 0;
        // foreach ($project_no as $key => $value) {
        //     if ($key <> $a) {
        //         echo $a . '===' . $value . '<br/>';
        //     }
        //     $a = $a + 1;
        // }

        return $project_name;
    }


    function get_finished_projects()
    {
        $project_no = [];
        $project_name = [];

        $directory = '//100.0.0.6/Finished-Projects';
        // $directory = 'D:/xampp/htdocs/h-app/test_fa/projects/02 - finished Projects';
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $projects_dir = $scanned_directory;

        // return $projects_dir;
        foreach ($projects_dir as $key => $value) {
            $position = stripos($value, '-');
            $sub = substr($value, 0, $position);
            $sub = trim($sub);
            $sub2 = substr($value, $position + 1);
            $sub2 = trim($sub2);
            $project_no[$sub] = $value;
            $project_name[$sub] = $sub2;
        }

        ksort($project_no);
        ksort($project_name);

        return $project_name;
    }


    function get_e_archive()
    {
        $project_no = [];
        $project_name = [];

        $directory = '//100.0.0.6/E-Archive';
        // $directory = 'D:/xampp/htdocs/h-app/test_fa/projects/02 - finished Projects';
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $projects_dir = $scanned_directory;

        foreach ($projects_dir as $key => $value) {
            $project_name['archive' . $key] = $value;
        }

        // ksort($project_no);
        // ksort($project_name);

        return $project_name;
    }
}
