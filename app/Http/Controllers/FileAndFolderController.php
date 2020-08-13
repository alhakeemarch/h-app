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
        // return $request;

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
}
