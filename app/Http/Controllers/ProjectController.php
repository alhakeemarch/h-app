<?php

namespace App\Http\Controllers;

use App\District;
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
    // -----------------------------------------------------------------------------------------------------------------
    private $server_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $server_ftp_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $server2_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $server2_ftp_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $running_projects_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $finished_projects_pathe = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $e_archive_projects_pathe = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $zaid_projects_pathe = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $safty_project_pathe = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $central_aria_pathe = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    // -----------------------------------------------------------------------------------------------------------------
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


        /**

        $allProjectsCount = Project::all()->count();
        $db_all_projects = Project::all();
        $allProjects = Project::orderBy('id', 'desc')->paginate(50);
        // $allProjects = $db_all_projects->latest()->paginate(100);
        // $allProjects = Project::paginate(100);

        try {
            // == @home = false @ work = true ==//
            if (true) {
                $runningProjects = $this->get_running_projects();
                $finishedProjects = $this->get_finished_projects();
                $e_archive = $this->get_e_archive();
                $zaied_projects = $this->get_zaied_projects();
            } else {
                $runningProjects =  $finishedProjects = $e_archive = $zaied_projects = $this->get_home_projects();
            }
        } catch (\Throwable $th) {
            $error_msg = $th->getMessage();
            // $error_msg = substr($error_msg, strpos($error_msg, ':') + 1);
            return redirect()->back()->withErrors([
                'Error',
                'Failed to git projects,',
                'please contact system administrator.',
                'server error:' . $error_msg
            ]);
        }
        $running_projects_path = "\\100.0.0.5\f$\data-server\02-Runing-Projects";
        return view('project.index')->with([
            'projects' => $allProjects,
            'allProjectsCount' => $allProjectsCount,
            'runningProjects' => $runningProjects,
            'finishedProjects' => $finishedProjects,
            'e_archive' => $e_archive,
            'zaied_projects' => $zaied_projects,
            'running_projects_path' => $running_projects_path,

        ]);
         */
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * index of running porjects.
     *
     * @return \Illuminate\Http\Response
     */
    // public function db_Projects(Request $request)
    // {
    //     $allProjectsCount = Project::all()->count();
    //     $allProjects = Project::orderBy('id', 'desc')->paginate(300);
    //     return view('project.db_projects')->with([
    //         'projects' => $allProjects,
    //         'allProjectsCount' => $allProjectsCount,
    //     ]);
    // }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * index of running porjects.
     *
     * @return \Illuminate\Http\Response
     */
    public function runningProjects()
    {
        $runningProjects = $this->get_running_projects();
        return view('project.running_projects')->with([
            'runningProjects' => $runningProjects,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * index of finished Projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function finshedProjects()
    {
        $finishedProjects = $this->get_finished_projects();
        return view('project.finshed_projects')->with([
            'finishedProjects' => $finishedProjects,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * index of zaid Projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function zaidProjects()
    {
        $zaied_projects = $this->get_zaied_projects();
        return view('project.zaied_projects')->with([
            'zaied_projects' => $zaied_projects,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * index of e-archive Projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function earchive(Request $request)
    {
        $e_archive = $this->get_e_archive();
        return view('project.e_archive_projects')->with([
            'e_archive' => $e_archive,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * to Upload safety Projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function Safety(Request $request)
    {
        $employment_no = auth()->user()->person->employment_no;
        $ff = $this->get_ff_types();
        $fa = $this->get_fa_types();
        $pathe = '\\\100.0.0.5\f$\data-server\03 - Safety Dept الدفاع المدني';
        $project_content = $this->get_project_content($pathe);

        return view('project.upload')->with([
            'project_no' => 'safty',
            'project_name' => 'دفاع مدني',
            'project_path' => 'safty',
            'project_location' => 'safty',
            'employment_no' => $employment_no,
            'project_content' => $project_content,
            'main_types' => ['FF&FA' => 'FF&FA - انذار وإطفاء', 'FF' => 'FF - اطفاء', 'FA' => 'FA - انذار',],
            'arc' => [],
            'str' => [],
            'elec' => [],
            'dr' => [],
            'ws' => [],
            'ff' => $ff,
            'fa' => $fa,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * to Upload central_area Projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function central_area()
    {
        return redirect()->action(
            'ProjectController@showUplodeView',
            [
                'project_no' => 'central_area',
                'project_name' => 'مشاريع المنطقة المركزية',
                'project_location' => 'central_area',
            ]
        );
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
        $project_dir = '';
        $project_no = $request->project_no;
        $project_name = $request->project_name;
        $project_path = $request->path;
        $project_location = $request->project_location;
        $employment_no = auth()->user()->person->employment_no;

        $main_types = $this->get_main_types();
        $arc = $this->get_arc_types();
        $str = $this->get_str_types();
        $elec = $this->get_elec_types();
        $dr = $this->get_dr_types();
        $ws = $this->get_ws_types();
        $ff = $this->get_ff_types();
        $fa = $this->get_fa_types();
        $survey = $this->get_survey_types();

        if (is_numeric($project_no) && $project_location == 'running project') {
            $project_dir = '\\\100.0.0.5\f$\data-server\02-Runing-Projects\\' . $project_no . ' - ' . $project_name . '\\';
        }
        if (!is_numeric($project_no) && $project_location == 'running project') {
            $project_dir = '\\\100.0.0.5\f$\data-server\02-Runing-Projects\\' . $project_name . '\\';
        }
        if ($project_location == 'finished project') {
            $project_dir = '\\' . $project_path . '\\';
        }
        if ($project_location == 'safty') {
            $pathe = '\\100.0.0.5\f$\data-server\03 - Safety Dept الدفاع المدني';
            $project_dir = '\\' . $pathe . '\\';
        }
        if ($project_location == 'central_area') {
            $pathe = '\\100.0.0.5\f$\data-server\1-CENTRAL AREA\_Upload';
            $project_dir = '\\' . $pathe . '\\';
        }
        if ($project_location == 'e_archive') {
            $pathe = '\\100.0.0.6\E-Archive';
            $project_dir = '\\' . $pathe . '\\' . $project_name . '\\';
        }
        $project_content = $this->get_project_content($project_dir);
        if (!isset($project_content)) {
            $project_content = ['notset' => 'doc'];
        }
        return view('project.upload')->with([
            'project_no' => $project_no,
            'project_name' => $project_name,
            'project_path' => $project_path,
            'project_location' => $project_location,
            'employment_no' => $employment_no,
            'main_types' => $main_types,
            'arc' => $arc,
            'str' => $str,
            'elec' => $elec,
            'dr' => $dr,
            'ws' => $ws,
            'ff' => $ff,
            'fa' => $fa,
            'project_content' => $project_content,
            'running_project_ftp' => 'ftp://100.0.0.5/02-Runing-Projects/',
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
        $validatedData = $request->validate([
            'project_no' => 'required',
            // 'project_no' => 'required|numeric',
            'project_name' => 'required',
            'project_location' => 'required',
            'employment_no' => 'required|numeric|digits:4',
            'main_type' => 'required',
            'detail' => 'nullable|',
            'file_input' => ['required', 'file', new ValidFileSize, new ValidFileType],
        ]);

        if (is_numeric($request->project_no) && $request->project_location == 'running project') {
            $project_dir = '\\\100.0.0.5\f$\data-server\02-Runing-Projects\\' . $request->project_no . ' - ' . $request->project_name . '\\';
        }
        if (!is_numeric($request->project_no) && $request->project_location == 'running project') {
            $project_dir = '\\\100.0.0.5\f$\data-server\02-Runing-Projects\\' . $request->project_name . '\\';
        }
        if ($request->project_location == 'finished project') {
            $project_dir = '\\' . $request->project_path . '\\';
        }
        if ($request->project_location == 'safty') {
            $pathe = '\\100.0.0.5\f$\data-server\03 - Safety Dept الدفاع المدني';
            $project_dir = '\\' . $pathe . '\\';
        }
        if ($request->project_location == 'central_area') {
            $pathe = '\\100.0.0.5\f$\data-server\1-CENTRAL AREA\_Upload';
            $project_dir = '\\' . $pathe . '\\';
        }
        if ($request->project_location == 'e_archive') {
            $pathe = '\\100.0.0.6\E-Archive\\';
            $project_dir = '\\' . $pathe . $request->project_name . '\\';
        }
        // $project_dir = '\\' . $request->project_path . '\\';
        // $project_dir = 'D:\projects' . '\\'; // this is for home only

        $date_time = date_format(now(), 'yy-m-d_H-i');
        $employment_no = $request->employment_no;
        $file_extension = $request->file_input->getClientOriginalExtension();
        $main_type = $request->main_type;
        $detail = $request->detail;

        // ----------------------------------------------------------------
        // to check if the file is document to upload in documents folder
        $is_document = false;
        $is_drawing = false;
        $type_mismatch = false;
        $doc_extensions = ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'jpeg', 'jpg', 'gif', 'png', 'bmp', 'tiff', 'psd', 'pdf'];
        $drawing_extensions = ['dwg', 'dxf'];

        if ($main_type == 'doc' || $main_type == 'img' || $main_type == 'row') {
            $is_document = true;
        }
        if (in_array(strtolower($file_extension), $drawing_extensions)) {
            $is_drawing = true;
        }
        if ($is_drawing && $is_document) {
            $type_mismatch = true;
        }

        if ($type_mismatch) {
            return redirect()->back()->withErrors(
                [
                    'Error',
                    'cannot upload drawing into documents',
                    'please choose the correct file specificity',
                    'or contact system administrator.'
                ]
            );
        }

        if ($is_document && ($request->project_location == 'running project' || $request->project_location == 'finished project')) {
            if (!file_exists($project_dir . '\01 - Documents')) {
                mkdir($project_dir . '\01 - Documents', 0777, true);
            }
            $project_dir = $project_dir . '\01 - Documents\\';
        }

        // ----------------------------------------------------------------
        $file_extension = $request->file_input->getClientOriginalExtension();
        if ($detail) {
            $file_name = $date_time . '_e' . $employment_no . '_' . $main_type . '_' . $detail . '.' . $file_extension;
        } else {
            $file_name = $date_time . '_e' . $employment_no . '_' . $main_type . '.' . $file_extension;
        }

        $file_name = strtolower($file_name);

        try {
            $done = move_uploaded_file($request->file_input, $project_dir . $file_name);
        } catch (\Throwable $th) {
            $error_msg = $th->getMessage();
            $error_msg = substr($error_msg, strpos($error_msg, ':') + 1);
            return redirect()->back()->withErrors([
                'Error',
                'Failed to upload file,',
                'please check the folder first then try to upload it again,',
                'or contact system administrator.',
                'server error:' . $error_msg
            ]);
        }
        $success_msg = ($is_document) ? 'File Uploded Successfully to Document folder' : 'File Uploded Successfully';

        if ($done) {
            return redirect()->back()->with('success', $success_msg);
        } else {
            return redirect()->back()->withErrors(['Error', 'failed to upload file,', 'please check the folder first and try to upload it again,', 'or contact system administrator.']);
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function download_file(Request $request)
    {
        // $server_path = 'ftp://100.0.0.5/'; // FOR FTP didnt work
        $server_path = '//100.0.0.5/f$/data-server/';
        $file_name = $request->file_name;
        $dir_name = $request->dir_name;
        $project_no = (is_numeric($request->project_no)) ? $request->project_no : false;
        if ($request->project_location == 'running project') {
            $project_location = '02-Runing-Projects/';
        }
        if ($request->project_location == 'safty') {
            $project_location = '03 - Safety Dept الدفاع المدني/';
        }
        if ($request->project_location == 'finished project') {
            $server_path = '//100.0.0.6/';
            $project_location = 'Finished-Projects/';
        }
        if ($request->project_location == 'e_archive') {
            $server_path = '//100.0.0.6/';
            $project_location = 'E-Archive/';
        }
        $headers = ['Content-Type: application/zip'];

        if ($project_no) {
            $path_to_file = $server_path . $project_location  . $project_no . ' - ' . $dir_name . '/' . $file_name;
        } elseif ($request->project_location == 'safty') {
            $path_to_file = $server_path . $project_location . $file_name;
        } else {
            $path_to_file = $server_path . $project_location  . $dir_name . '/' . $file_name;
        }

        try {
            return response()->download($path_to_file, $file_name, $headers);
        } catch (\Throwable $th) {
            $error_msg = $th->getMessage();
            $error_msg = substr($error_msg, strpos($error_msg, ':') + 1);
            return redirect()->back()->withErrors([
                'Error',
                'Failed to downloa file,',
                'please check the folder first then try to downloa it again,',
                'or contact system administrator.',
                'server error:' . $error_msg
            ]);
        }
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
        // $customers = Person::all()->where('is_customer', true)->reverse();
        // $current_customer = $customers->where('national_id', $request->owner_national_id);
        // return $customers;
        // return $project;
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
    // -------------------------------------------------------------------------------------------------------------------
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
    // -------------------------------------------------------------------------------------------------------------------
    function forlder_files(Request $request, Project $project)
    {
        //
    }
    // -------------------------------------------------------------------------------------------------------------------
    function get_project_content($directory)
    {
        // return $directory;
        $project_content = [];
        $doc_dir = '';
        // $directory = '//100.0.0.5/f$/data-server/02-Runing-Projects/انفاق المنطقة المركزية';

        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        // return $scanned_directory;

        if (in_array('01 - Documents', $scanned_directory)) {
            $doc_dir = $directory . '//01 - Documents';
            $scaned_doc_directory = array_diff(scandir($doc_dir), array('..', '.'));

            foreach ($scaned_doc_directory as $key => $value) {
                if ($value == 'Thumbs.db') {
                    unlink($directory . '01 - Documents\\' . $value);
                } elseif (is_dir($directory . '01 - Documents\\' . $value)) {
                    $project_content[$value] = 'dir_in_doc';
                } else {
                    $project_content[$value] = 'doc';
                }
            }
        }

        $main_types = [
            'all', 'doc', 'img', 'row', 'con', 'pre', 'arc', 'str', 'ele', 'dr_', 'dr.', 'ws_', 'ws.', 'hvac', 'ff_', 'ff.', 'fa_', 'fa.', 'eva', 'tou', 'sur',
        ];

        // deleting unwanted files
        foreach ($scanned_directory as  $value) {
            if ($value == 'Thumbs.db') {
                unlink($directory . '//' . $value);
            }

            $path_info = pathinfo($directory . '//' . $value);
            if (isset($path_info['extension'])) {
                $file_extension = $path_info['extension'];
                $is_unwanted = (($file_extension == 'bak') || ($file_extension == 'dwl') || ($file_extension == 'dwl2') || ($file_extension == 'lsp'));
                if ($is_unwanted) {
                    unlink($directory . '//' . $value);
                }
            }
        }

        foreach ($scanned_directory as $key => $value) {
            if (is_dir($directory . '//' . $value)) {
                $project_content[$value] = 'dir';
            } elseif (strlen($value) < 26) {
                $project_content[$value] = 'not_uplod';
            } elseif (!in_array(substr($value, 23, 3), $main_types)) {
                $project_content[$value] = 'not_uplod';
            } else {
                $project_content[$value] = substr($value, 23);
            }
        }

        $project_content[$directory] = 'main_dir';
        $project_content[$doc_dir] = 'doc_dir';
        return $project_content;
    }
    // -------------------------------------------------------------------------------------------------------------------
    function get_finished_projects()
    {
        $project_no = [];
        $project_name = [];
        $directory = '//100.0.0.6/Finished-Projects';
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
    // -----------------------------------------------------------------------------------------------------------------
    public function get_main_types()
    {
        $main_types = [
            'all' => 'All - كامل المشروع',
            'doc' => 'Scanned Document -مستند سكانر',
            'img' => 'image - صورة',
            'row' => 'Row Document - مستند خام',
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
        return $main_types;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_arc_types()
    {
        $arc = [
            'all', 'plans', 'calc-sheet', 'details', 'elevation', 'section', 'layout', 'BF', 'GF', 'mezanin', '1stF', '2ndF',
            '3rdF', '4thF', 'Typical-F', 'roof-F', 'roof-drainage', 'perspective', 'stair-roof', 'fence', 'other'
        ];
        return $arc;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_str_types()
    {
        $str = [
            'all', 'plans', 'details', 'columns', 'foundation', 'beams', 'smells', 'section', 'BF', 'GF', 'mezanin', '1stF', '2endF',
            '3rdF', '4thF', 'Typical-F', 'roof-F', 'stair-roof', 'fence', 'other'
        ];
        return $str;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_elec_types()
    {
        $elec = [
            'all', 'plans', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'earthing', 'fence', 'other'
        ];
        return $elec;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_dr_types()
    {
        $dr = [
            'all', 'plans', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'fence', 'other'
        ];
        return $dr;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_ws_types()
    {
        $ws = [
            'all', 'plans', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'fence', 'other'
        ];

        return $ws;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_ff_types()
    {
        $ff = [
            'all', 'plans', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'fence', 'other'
        ];
        return $ff;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_fa_types()
    {
        $fa = [
            'all', 'plans', 'details', 'BF', 'GF', 'mezanin', '1stF', '2endF', '3rdF', '4thF', 'Typical-F', 'roof-F',
            'stair-roof', 'fence', 'other'
        ];
        return $fa;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_survey_types()
    {
        $survey = [
            'رفع مساحي
            بيانات موقع
            قرار مساحي
            قرار ذرعة
            محضر تثبيت
            محضر مناسيب
            لوحة تنظيمية
            مخطط تنظيمي
            مخطط إرشادي
            لوحة فرز
            لوحة دمج
            بارسل الأمانة
            إحداثيات
            في ار اس'
        ];

        return $survey;
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

        $project_cout = $all_projects->count();
        $projects = $all_projects->paginate($project_cout);

        return view('project.index')->with([
            'projects' => $projects,
            'project_cout' => $project_cout,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
}
