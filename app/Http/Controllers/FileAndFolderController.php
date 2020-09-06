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
    private $safty_project_pathe = '\\100.0.0.5\f$\data-server\03 - Safety Dept الدفاع المدني';
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
    public function delete_file(Request $request)
    {
        dd($request);

        $emp_no = auth()->user()->person->employment_no;
        $file_name = $request->file_name;
        $dir_name = $request->dir_name;
        $project_no = (is_numeric($request->project_no)) ? $request->project_no : false;

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
        dd($path_with_filename);
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
        // return $dir_content;

        return view('file_and_folder.emp_dir_show')->with([
            'dir_content' => $dir_content,
            'dir_name' => $dir_name,
            'dir_path' => $dir_path,
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function download_file(Request $request)
    {
        return $request;
    }
    // -----------------------------------------------------------------------------------------------------------------
}
