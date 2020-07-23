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
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request)
    {
        $validatedData = $request->validate([
            'project_no' => 'required',
            'project_name' => 'required',
            'project_location' => 'required',
            'employment_no' => 'required|numeric|digits:4',
            'main_type' => 'required',
            'detail' => 'nullable|',
            'file_input' => ['required', 'file', new ValidFileSize, new ValidFileType],
        ]);
        return $validatedData;

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

        if ($is_document) {
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
}
