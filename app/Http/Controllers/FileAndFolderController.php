<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Strong;
use PhpParser\Node\Stmt\TryCatch;

class FileAndFolderController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    private $server_path = '\\100.0.0.5\f$\data-server\\';
    private $server_ftp_path = 'ftp';
    private $server2_path = '//100.0.0.6//';
    private $server2_ftp_path = 'ftp';
    private $running_projects_path = '\\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    private $finished_projects_pathe = '//100.0.0.6/Finished-Projects//';
    private $emps_dir_path = '//100.0.0.6/Follow_Up/05-Employees_الموظفين';
    private $e_archive_projects_pathe = '//100.0.0.6\E-Archive/';
    private $zaid_projects_pathe = '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1441\\';
    private $safty_project_pathe = '\\\100.0.0.5\f$\data-server\03 - Safety Dept الدفاع المدني';
    private $central_aria_pathe = '\\100.0.0.5\f$\data-server\1-CENTRAL AREA\\';
    // -----------------------------------------------------------------------------------------------------------------
    // private $server_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    // private $server_ftp_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    // private $server2_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    // private $server2_ftp_path = '\\100.0.0.5\f$\data-server\02-Runing-Projects\\';
    // private $zaid_projects_pathe = 'D:\projects\\';
    // private $central_aria_pathe = 'D:\projects\\';
    // private $e_archive_projects_pathe = 'D:\projects\\';
    // private $safty_project_pathe = 'D:\projects\\';
    // private $running_projects_path = 'D:\projects\\';
    // private $finished_projects_pathe = 'D:\projects\\';
    // -----------------------------------------------------------------------------------------------------------------
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
    public function index()
    {
        return view('file_and_folder.index');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function delete_file(Request $request)
    {
        // dd($request);

        $emp_no = auth()->user()->person->employment_no;
        $file_name = $request->file_name;
        $dir_name = $request->dir_name;
        $project_no = (is_numeric($request->project_no)) ? $request->project_no : false;

        // to check if the file in document folder 
        if (substr($request->file_description, 0, 3) == 'doc' || substr($request->file_description, 0, 3) == 'img' || substr($request->file_description, 0, 3) == 'row') {
            if (!($request->file_description === 'doc_dir')) {
                $dir_name = $dir_name . '/01 - Documents';
            }
        }

        //check if user can delete the file
        $is_uploaded_by_the_user = (strpos($file_name, '_e' . $emp_no)) ? true : false;
        $authrized_to_delete = (auth()->user()->is_manager || auth()->user()->is_admin) ? true : false;
        if (!($is_uploaded_by_the_user || $authrized_to_delete)) {
            return redirect()->back()->withErrors([
                'Failed to delet file,',
                'you are not authorized to delete this file',
                'contact system administrator.',
            ]);
        }

        // to get file location
        switch ($request->project_location) {
            case 'running project':
                $project_location = $this->running_projects_path;
                break;
            case 'safty':
                $project_location = $this->safty_project_pathe;
                break;
            case 'finished project':
                $project_location = $this->finished_projects_pathe;
                break;
            case 'e_archive':
                $project_location = $this->e_archive_projects_pathe;
                break;

            default:
                return redirect()->back()->withErrors([
                    'unknown file location',
                    'contact system administrator.',
                ]);
                // break;
        }

        // to get pathe with filename 
        if ($project_no) {
            $path_with_filename = $project_location  . $project_no . ' - ' . $dir_name . '/' . $file_name;
        } elseif ($request->project_location == 'safty') {
            $path_with_filename = $project_location . $file_name;
        } else {
            $path_with_filename = $project_location  . $dir_name . '/' . $file_name;
        }
        // dd($path_with_filename);
        try {
            if (unlink($path_with_filename)) {
                return redirect()->back()->with('success', 'file deleted');
            }
        } catch (\Throwable $th) {
            $error_msg = $th->getMessage();
            $error_msg = substr($error_msg, strpos($error_msg, ':') + 1);
            return redirect()->back()->withErrors([
                'Failed to delet file,',
                'please check the folder first then try to delet it again,',
                'or contact system administrator.',
                'server error:' . $error_msg
            ]);
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function emps_dir(Request $request)
    {
        // return $request;
        $saudi_emps = [];
        $saudi_emps_old = [];
        $non_saudi_emps = [];
        $non_saudi_emps_old = [];
        $other = [];
        $directory = $this->emps_dir_path;
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $i = 1;
        foreach ($scanned_directory as $value) {
            if (substr($value, 0, 1) === '1' && substr($value, -4) !== '_old') {
                $n_id = substr($value, 0, 10);
                $name = substr($value, 11);
                $saudi_emps[$n_id] = $name;
            } elseif (substr($value, 0, 1) === '1' && substr($value, -4) === '_old') {
                $n_id = substr($value, 0, 10);
                $name = substr($value, 11, -4);
                $saudi_emps_old[$n_id] = $name;
            } elseif (substr($value, 0, 1) === '2' && substr($value, -4) !== '_old') {
                $n_id = substr($value, 0, 10);
                $name = substr($value, 11);
                $non_saudi_emps[$n_id] = $name;
            } elseif (substr($value, 0, 1) === '2' && substr($value, -4) === '_old') {
                $n_id = substr($value, 0, 10);
                $name = substr($value, 11, -4);
                $non_saudi_emps_old[$n_id] = $name;
            } else {
                $other[$i] = $value;
            }
            $i = $i + 1;
        }

        // dd($saudi_emps, $saudi_emps_old, $non_saudi_emps, $non_saudi_emps_old, $other);
        return view('file_and_folder.emps_dir_index')->with([
            'saudi_emps' => $saudi_emps,
            'saudi_emps_old' => $saudi_emps_old,
            'non_saudi_emps' => $non_saudi_emps,
            'non_saudi_emps_old' => $non_saudi_emps_old,
            'other' => $other,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function show_emp_dir(Request $request)
    {
        // return $request;
        $main_emps_dir = $this->emps_dir_path;
        $dir_path = '';
        $dir_name = '';
        if ($request->type === 'other') {
            $dir_name = $request->name;
            $dir_path = $main_emps_dir . '/' . $request->name;
        } elseif ($request->type === 'saudi_emps_old' || $request->type === 'non_saudi_emps_old') {
            $dir_name = $request->id . '-' . $request->name . '_old';
            $dir_path = $main_emps_dir . '/' . $request->id . '-' . $request->name . '_old';
        } else {
            $dir_name = $request->id . '-' . $request->name;
            $dir_path = $main_emps_dir . '/' . $request->id . '-' . $request->name;
        }

        $dir_content = array_diff(scandir($dir_path), array('..', '.'));



        return view('file_and_folder.emp_dir_show')->with([
            'dir_content' => $dir_content,
            'dir_name' => $dir_name,
            'dir_path' => $dir_path,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------


















    /**
     * index of running porjects.
     *
     * @return \Illuminate\Http\Response
     */
    public function runningProjects()
    {
        $runningProjects = $this->get_running_projects();
        return view('file_and_folder.running_projects')->with([
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
        return view('file_and_folder.finshed_projects')->with([
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
        return view('file_and_folder.zaied_projects')->with([
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
        return view('file_and_folder.e_archive_projects')->with([
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
        $pathe = $this->safty_project_pathe;
        $project_content = $this->get_project_content($pathe);

        return view('file_and_folder.upload')->with([
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
            'FileAndFolderController@showUplodeView',
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
        $project = $project->where('project_no', $request->project_no)->first();
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
            $project_dir = $this->running_projects_path . $project_no . ' - ' . $project_name . '\\';
        }
        if (!is_numeric($project_no) && $project_location == 'running project') {
            $project_dir = $this->running_projects_path . $project_name . '\\';
        }
        if ($project_location == 'finished project') {
            $project_dir = $this->finished_projects_pathe . $project_no . ' - ' . $project_name . '\\';
        }
        if ($project_location == 'safty') {
            $pathe = $this->safty_project_pathe;
            $project_dir = '\\' . $pathe . '\\';
        }
        if ($project_location == 'central_area') {
            $project_dir = '\\' . $this->central_aria_pathe . '_Upload' . '\\';
        }

        if ($project_location == 'e_archive') {
            $pathe = $this->e_archive_projects_pathe;
            $project_dir = $pathe . $project_name . '\\';
        }
        $project_content = $this->get_project_content($project_dir);
        if (!isset($project_content)) {
            $project_content = ['notset' => 'doc'];
        }



        return view('file_and_folder.upload')->with([
            'ftp' => $this->server_ftp_path,
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
            'project' => $project,
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
        // dd($request->all());
        $file_extensions = [];
        $validatedData = $request->validate([
            'project_no' => 'required',
            // 'project_no' => 'required|numeric',
            'project_name' => 'required',
            'project_location' => 'required',
            'employment_no' => 'required|numeric|digits:4',
            'main_type' => 'required',
            'detail' => 'nullable|',
            // 'file_input' => ['required', 'file', new ValidFileSize, new ValidFileType],
            'file_input' => ['required', new ValidFileSize, new ValidFileType],
        ]);

        if (is_numeric($request->project_no) && $request->project_location == 'running project') {
            $project_dir = $this->running_projects_path . $request->project_no . ' - ' . $request->project_name . '\\';
        }
        if (!is_numeric($request->project_no) && $request->project_location == 'running project') {
            $project_dir = $this->running_projects_path . $request->project_name . '\\';
        }
        if ($request->project_location == 'finished project') {
            $project_dir = $this->finished_projects_pathe . $request->project_no . ' - ' . $request->project_name . '\\';
        }
        if ($request->project_location == 'safty') {
            $pathe = $this->safty_project_pathe;
            $project_dir = '\\' . $pathe . '\\';
        }
        if ($request->project_location == 'central_area') {
            $project_dir = $this->central_aria_pathe . '_Upload';
        }
        if ($request->project_location == 'e_archive') {
            $pathe = $this->e_archive_projects_pathe;
            $project_dir =  $pathe . $request->project_name . '\\';
        }
        $date_time = date_format(now(), 'Ymd_His');
        $employment_no = $request->employment_no;
        foreach ($request->file_input as $file) {
            array_push($file_extensions, $file->getClientOriginalExtension());
        }
        // $file_extension = $request->file_input->getClientOriginalExtension();
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
        foreach ($file_extensions as $file_extension) {
            if (in_array(strtolower($file_extension), $drawing_extensions)) {
                $is_drawing = true;
            }
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
        $i = 1;
        $done = false;
        foreach ($request->file_input as $file) {
            $file_extension = $file->getClientOriginalExtension();
            if ($detail) {
                $file_name = $date_time . '_e' . $employment_no . '_' . $main_type . '_' . $detail . '_' . $i . '.' . $file_extension;
            } else {
                $file_name = $date_time . '_e' . $employment_no . '_' . $main_type . '_' . $i . '.' . $file_extension;
            }
            // ------------------------------------
            $file_name = strtolower($file_name);

            try {
                $done = move_uploaded_file($file, $project_dir . $file_name);
            } catch (\Throwable $th) {
                $error_msg = $th->getMessage();
                $error_msg = substr($error_msg, strpos($error_msg, ':') + 1);
                return redirect()->back()->withErrors([
                    'Error',
                    'Failed to upload,',
                    'please check the folder first then try to upload again,',
                    'or contact system administrator.',
                    'server error:' . $error_msg
                ]);
            }
            // ------------------------------------
            // $i = $i + 1;
            $i++;
        }
        // ----------------------------------------------------------------
        $success_msg = ($is_document) ? 'Uploded Successfully to Document folder' : 'Uploded Successfully';

        if ($done) {
            return redirect()->back()->with('success', $success_msg);
        } else {
            return redirect()->back()->withErrors(['Error', 'failed to upload ,', 'please check the folder first and try to upload it again,', 'or contact system administrator.']);
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function download_file(Request $request)
    {
        $file_name = $request->file_name;
        $dir_name = $request->dir_name;
        $project_location = '';
        $project_no = (is_numeric($request->project_no)) ? $request->project_no : false;
        if ($request->project_location == 'running project') {
            $project_location = $this->running_projects_path;
        }
        if ($request->project_location == 'safty') {
            $project_location = $this->safty_project_pathe;
        }
        if ($request->project_location == 'finished project') {
            $project_location = $this->finished_projects_pathe;
        }
        if ($request->project_location == 'e_archive') {
            $project_location = $this->e_archive_projects_pathe;
        }
        if ($project_no) {
            $path_to_file = $project_location  . $project_no . ' - ' . $dir_name . '/' . $file_name;
        } elseif ($request->project_location == 'safty') {
            $path_to_file = $project_location . $file_name;
        } else {
            $path_to_file = $project_location  . $dir_name . '/' . $file_name;
        }
        if ($request->project_location == 'emp_dir') {
            $path_to_file = $request->dir_path . '/' . $request->file_name;
        }
        $headers = ['Content-Type: application/zip'];
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
    // -------------------------------------------------------------------------------------------------------------------

    function get_running_projects()
    {
        $project_no = [];
        $project_name = [];
        $directory = $this->running_projects_path;
        try {
            //code...
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
        } catch (\Throwable $th) {
            //throw $th;
        }


        return $project_name;
    }
    // -------------------------------------------------------------------------------------------------------------------
    function get_project_content($directory)
    {
        $project_content = [];
        $doc_dir = '';

        $scanned_directory = array_diff(scandir($directory), array('..', '.'));

        if (in_array('01 - Documents', $scanned_directory)) {
            $doc_dir = $directory . '//01 - Documents';
            $scaned_doc_directory = array_diff(scandir($doc_dir), array('..', '.'));

            foreach ($scaned_doc_directory as $key => $value) {
                if ($value == 'Thumbs.db') {
                    // unlink($directory . '01 - Documents\\' . $value);
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
        // foreach ($scanned_directory as  $value) {
        //     if ($value == 'Thumbs.db') {
        //         unlink($directory . '//' . $value);
        //     }

        //     $path_info = pathinfo($directory . '//' . $value);
        //     if (isset($path_info['extension'])) {
        //         $file_extension = $path_info['extension'];
        //         $is_unwanted = (($file_extension == 'bak') || ($file_extension == 'dwl') || ($file_extension == 'dwl2') || ($file_extension == 'lsp'));
        //         if ($is_unwanted) {
        //             unlink($directory . '//' . $value);
        //         }
        //     }
        // }

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
        $directory = $this->finished_projects_pathe;
        try {
            $scanned_directory = array_diff(scandir($directory), array('..', '.'));
            $projects_dir = $scanned_directory;

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
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $project_name;
    }
    // -------------------------------------------------------------------------------------------------------------------
    function get_e_archive()
    {
        $project_no = [];
        $project_name = [];

        $directory = $this->e_archive_projects_pathe;
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $projects_dir = $scanned_directory;
        foreach ($projects_dir as $key => $value) {
            $project_name['archive' . $key] = $value;
        }

        // ksort($project_no);
        // ksort($project_name);

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
            '1442' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1442',
            '1443' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1443',
            '1444' => '//100.0.0.5/f$/data-server/Zaied/مشاريع منتهية/1444',
        ];

        foreach ($directories as $directory_key => $directory) {

            if ($directory !== false and is_dir($directory)) {

                $scanned_directory = array_diff(scandir($directory), array('..', '.'));
                $kyed_dir = [];
                foreach ($scanned_directory as $key => $value) {
                    $kyed_dir[$key . '|' . $directory_key] = $value;
                }
                array_push($projects_dir, $kyed_dir);
            }
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
        // $a = [];
        // $fiel_specialties = FileSpecialty::all();
        // foreach ($fiel_specialties as  $specialty) {
        //     if ($specialty['belongto'] == 'main') {
        //         $a[$specialty['specialty']] = $specialty['description'];
        //     }
        // }
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
    public static function create_dir_in_running_project($project)
    {
        $msg = '';
        $runningProjects = (new self)->get_running_projects();
        $project_no = $project->project_no;
        $project_name = $project->project_name_ar;
        $project_owner_name = $project->owner_name_ar;
        if (array_key_exists($project_no, $runningProjects)) {
            $msg = 'project folder already exists';
            return $msg;
        }
        $running_projects_path = (new self)->running_projects_path;

        try {
            mkdir($running_projects_path . $project_no . ' - ' . $project_name, 0777, true);
            $msg = 'folder created successfully in running project';
        } catch (\Throwable $th) {
            $error_msg = $th->getMessage();
            $error_msg = substr($error_msg, strpos($error_msg, ':') + 1);

            $msg = 'failed to create a folder' . '|' . $error_msg;
        }
        return $msg;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_project_folders($project)
    {
        $project_folders = [];
        if (!isset($project->project_no)) {
            return $project_folders;
        }
        $runningProjects = (new self)->get_running_projects();
        if (array_key_exists($project->project_no, $runningProjects)) {
            $project_folders['running project']['project_no'] = $project->project_no;
            $project_folders['running project']['project_name'] = $runningProjects[$project->project_no];
        }

        $finished_projects = (new self)->get_finished_projects();
        if (array_key_exists($project->project_no, $finished_projects)) {
            $project_folders['finished project']['project_no'] = $project->project_no;
            $project_folders['finished project']['project_name'] = $finished_projects[$project->project_no];
        }
        return $project_folders;
    }
    // -----------------------------------------------------------------------------------------------------------------
}
