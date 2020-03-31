<?php

namespace App\Http\Controllers;

use App\Person;
use App\Plot;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allProjects = Project::all();
        // == @home = false @ work = true ==//
        if (true) {
            $runningProjects = $this->get_running_projects();
            $finishedProjects = $this->get_finished_projects();
            $e_archive = $this->get_e_archive();
            $zaied_projects = $this->get_zaied_projects();
        } else {
            $runningProjects =  $finishedProjects = $e_archive = $zaied_projects = $this->get_home_projects();
        }
        return view('project.index')->with([
            'projects' => $allProjects,
            'runningProjects' => $runningProjects,
            'finishedProjects' => $finishedProjects,
            'e_archive' => $e_archive,
            'zaied_projects' => $zaied_projects,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function showUplodeView(Project $project, Request $request)
    {
        // return $request;
        $project_no = $request->project_no;
        $project_name = $request->project_name;

        $project_path = $request->path;

        $project_location = $request->project_location;
        $user = auth()->user()->user_name;
        $employment_no = auth()->user()->person->employment_no;


        $file_types = ['drowing(dwg,dxf)', 'document(docx,pdf,xlsx)', 'image(jpeg,png,psd)', 'files(zip,rar)'];

        $main_types = [
            'all' => 'All - كامل المشروع',
            'concept' => 'Concept - فكرة',
            'preliminary' => 'preliminary - ابتدائي',
            'ARC' => 'ARC - معماري',
            'STR' => 'STR - إنشائي',
            'Elec' => 'Elec - كهرباء',
            'DR' => 'DR - صرف',
            'WS' => 'WS - تغذية',
            'HVAC' => 'HVAC - تكيف',
            'FF' => 'FF - اطفاء',
            'FA' => 'FA - انذار',
            'evacuation' => 'evacuation - اخلاء',
            'tourism' => 'tourism - سياحة',
            'Elec-Paper' => 'Elec-Paper- ورقة الكهرباء',
            'survey' => 'survey - مساحة'
        ];


        $arc = [
            'all', 'calc-sheet', 'details', 'elevation', 'section', 'layout', 'BF', 'GF', 'mezanin', '1stF', '2ndF',
            '3rdF', '4thF', 'Typical-F', 'roof-F', 'roof-drainage', 'perspective', 'stair-roof', 'fence', 'other'
        ];

        $str = [
            'all', 'details', 'columns', 'foundation', 'beams', 'smells', 'section', 'BF', 'GF', 'mezanin', '1stF', '2endF',
            '3rdF', '4thF', 'Typical-F', 'roof-F', 'stair-roof', 'fence', 'other'
        ];

        $elec = [
            'all', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'earthing', 'fence', 'other'
        ];

        $dr = [
            'all', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'fence', 'other'
        ];

        $ws = [
            'all', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'fence', 'other'
        ];

        $ff = [
            'all', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'fence', 'other'
        ];

        $fa = [
            'all', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'fence', 'other'
        ];

        return view('project.upload')->with([
            'project_no' => $project_no,
            'project_name' => $project_name,
            'project_path' => $project_path,
            'project_location' => $project_location,
            'employment_no' => $employment_no,
            'file_types' => $file_types,
            'main_types' => $main_types,
            'arc' => $arc,
            'str' => $str,
            'elec' => $elec,
            'dr' => $dr,
            'ws' => $ws,
            'ff' => $ff,
            'fa' => $fa,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Project $project, Request $request)
    {
        $validator = $request->validate([
            'file_input' => 'required|file|max:20971520| mimes:dwg',
        ]);




        // return $request->file_input;
        // dd($request->file_input->getClientOriginalName());
        // dd($request->file('file_input'));

        $date_time = date_format(now(), 'y-m-d_H-i');
        $employment_no = $request->employment_no;
        $main_type = $request->main_type;
        $detail = $request->detail;

        $file_extension = $request->file_input->getClientOriginalExtension();
        $file_name = $date_time . '_e' . $employment_no . '_' . $main_type . '_' . $detail . '.' . $file_extension;
        $file_name = strtolower($file_name);
        // dd($file_extension);


        $X = move_uploaded_file($request->file_input, '\\\100.0.0.5\f$\data-server\New folder\\' . $file_name);
        dd($X);
        // $path = $request->file_input->store('\\\100.0.0.5\f$\data-server\New folder\\');
        // dd($path);


        // $path = Storage::putFileAs(
        //     '\\\100.0.0.5\f$\data-server\New folder',
        //     $request->file('file_input'),
        //     $request->user()->id
        // );
        // dd($path);

        /**
        -test: false
        -originalName: "فاتورة السداد.jpg"
        -mimeType: "image/jpeg"
        -error: 0
        #hashName: null
        path: "C:\Users\Administrator\AppData\Local\Temp"
        filename: "phpFA01.tmp"
        basename: "phpFA01.tmp"
        pathname: "C:\Users\Administrator\AppData\Local\Temp\phpFA01.tmp"
        extension: "tmp"
        realPath: "C:\Users\Administrator\AppData\Local\Temp\phpFA01.tmp"
        aTime: 2020-03-31 09:38:01
        mTime: 2020-03-31 09:38:01
        cTime: 2020-03-31 09:38:01
        inode: 0
        size: 31995
        perms: 0100666
        owner: 0
        group: 0
        type: "file"
        writable: true
        readable: true
        executable: false
        file: true
        dir: false
        link: false
        linkTarget: "C:\Users\Administrator\AppData\Local\Temp\phpFA01.tmp"

         */





        // return $request;

        // 2020-06-15_12-20_arc_1003_aaaaa.dwg

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
        // $project_name['path'] = $directory;
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
        // $project_name['path'] = $directory;
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
        // $project_name['path'] = $directory;
        foreach ($projects_dir as $key => $value) {
            $project_name['archive' . $key] = $value;
        }

        // ksort($project_no);
        // ksort($project_name);

        return $project_name;
    }
    // -------------------------------------------------------------------------------------------------------------------
    function get_home_projects()
    {
        $project_no = [];
        $project_name = [];

        $directory = 'D:\projects';
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $projects_dir = $scanned_directory;

        // return $projects_dir;
        // $project_name['path'] = $directory;
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
    // -------------------------------------------------------------------------------------------------------------------
    function get_zaied_projects()
    {
        $project_no = [];
        $project_name = [];
        $projects_dir = [];

        $directories = [
            'ورقية' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/2- ورقية',
            'قبل 1435' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/قبل 1435',
            '1435' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1435',
            '1436' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1436',
            '1437' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1437',
            '1438' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1438',
            '1439' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1439',
            '1439->بلدي' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1439/1-بلدي',
            '1440' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1440',
            '1440->بلدي' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1440/بلدي',
            '1441' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1441',

            // 'directory' => 'D:/xampp/htdocs/h-app/test_fa/projects/02 - finished Projects',
        ];
        // $project_name['path'] = '100.0.0.5/f$/data-server/Zaied';
        foreach ($directories as $directory_key => $directory) {
            $scanned_directory = array_diff(scandir($directory), array('..', '.'));
            $kyed_dir = [];
            foreach ($scanned_directory as $key => $value) {
                $kyed_dir[$key . '|' . $directory_key] = $value;
            }
            array_push($projects_dir, $kyed_dir);
        }

        // $projects_dir = $scanned_directory;

        foreach ($projects_dir as $key => $value) {
            foreach ($value as $key => $value) {
                $project_name[$key] = $value;
            }
        }

        // ksort($project_no);
        // ksort($project_name);
        // return $projects_dir;
        return $project_name;
    }
}
