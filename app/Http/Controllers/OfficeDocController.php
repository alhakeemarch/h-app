<?php

namespace App\Http\Controllers;

use App\OfficeDoc;
use App\Rules\ValidDate;
use App\Rules\ValidDocType;
use App\Rules\ValidFileSize;
use Illuminate\Http\Request;

class OfficeDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valed_data = $request->validate([
            'office_data_id' => 'numeric|required',
            'number' => 'required|string|unique:office_docs',
            'name_ar' => 'required|string',
            'name_en' => 'string|nullable',
            'issue_date' => ['nullable', new ValidDate()],
            'expire_date' => ['nullable', new ValidDate()],
            'issue_place' => 'string|nullable',
            'organization_name_ar' => 'string|nullable',
            'organization_name_en' => 'string|nullable',
            'notes' => 'string|nullable',
            'private_notes' => 'string|nullable',
        ]);

        $valed_data['created_by_id'] = auth()->user()->id;
        $office_document = OfficeDoc::create($valed_data);
        return redirect()->back()->with('success', ['document added', 'تم اضافة المستند بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfficeDoc  $officeDoc
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeDoc $officeDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfficeDoc  $officeDoc
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, OfficeDoc $officeDoc)
    {
        // return $request;
        if ($request->form_action == 'download_office_doc') {
            return $this->download_office_doc($officeDoc);
        }
        if ($request->form_action == 'show_uplod_form') {
            return view('officeDoc.upload')->with(['officeDoc' => $officeDoc]);
        }
        if ($request->form_action == 'show_edit_office_doc_info') {
            return view('officeDoc.edit')->with(['officeDoc' => $officeDoc]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfficeDoc  $officeDoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeDoc $officeDoc)
    {
        // dd($request->form_action);

        if ($request->form_action == 'update_office_doc_info') {
            $valed_data = $request->validate([
                'number' => 'required|string',
                'name_ar' => 'required|string',
                'name_en' => 'string|nullable',
                'issue_date' => ['nullable', new ValidDate()],
                'expire_date' => ['nullable', new ValidDate()],
                'issue_place' => 'string|nullable',
                'organization_name_ar' => 'string|nullable',
                'organization_name_en' => 'string|nullable',
                'notes' => 'string|nullable',
                'private_notes' => 'string|nullable',
            ]);
            $valed_data['last_edit_by_id'] = auth()->user()->id;
            $officeDoc->update($valed_data);
            return redirect()->action('OfficeDataController@show', $officeDoc->office_data_id)
                ->withSuccess(['document info updated successfully', 'تم تحديث بيانات المسنتد بنجاح']);
        }
        // ---------------------------------------------------------------------------------------------------
        if ($request->form_action == 'upload_office_doc') {
            $request->validate([
                'file_input' => ['required', new ValidFileSize, new ValidDocType],
                'expire_date' => ['nullable', new ValidDate()],
            ]);
            $file_extension = $request->file_input->getClientOriginalExtension();
            $file_size = $request->file_input->getSize();
            $date_time = date_format(now(), 'Ymd_His');
            $employment_no = auth()->user()->person->employment_no;

            $file_name = strtolower($date_time . '_' . $officeDoc->name_ar . '_e' . $employment_no . '.' . $file_extension);
            $project_dir = '\\\100.0.0.5\f$\data-server\00-office_doc\\';
            if ($officeDoc->full_url) {
                try {
                    copy($officeDoc->full_url, $officeDoc->base_url . '__old\\' . $officeDoc->doc_name);
                    unlink($officeDoc->full_url);
                } catch (\Throwable $th1) {
                    return redirect()->back()->withErrors(['error', $th1->getMessage()]);
                }
            }
            try {
                $done = move_uploaded_file($request->file_input, $project_dir . $file_name);
                $officeDoc->base_url = $project_dir;
                $officeDoc->doc_name = $file_name;
                $officeDoc->full_url = $project_dir . $file_name;
                $officeDoc->last_edit_by_id = auth()->user()->id;
                $officeDoc->save();
            } catch (\Throwable $th) {
                $error_msg = $th->getMessage();
                $error_msg = substr($error_msg, strpos($error_msg, ':') + 1);
                return redirect()->back()->withErrors([
                    'Error',
                    'Failed to upload,',
                    'please contact system administrator.',
                    'server error:' . $error_msg
                ]);
            }
            if ($done) {
                return redirect()->back()->withSuccess('done');
            } else {
                return redirect()->back()->withErrors(['errooorrrrr']);
            }


            return $file_name;
            return $officeDoc;
            return $request;
        }
        // ---------------------------------------------------------------------------------------------------
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfficeDoc  $officeDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeDoc $officeDoc)
    {
        //
    }

    private function download_office_doc($officeDoc)
    {
        $headers = ['Content-Type: application/zip'];
        try {
            // return response()->download($officeDoc->base_url, $officeDoc->doc_name, $headers);
            return response()->download($officeDoc->full_url, $officeDoc->doc_name, $headers);
            // return response()->download($officeDoc->full_url, '', $headers);
        } catch (\Throwable $th) {
            $error_msg = $th->getMessage();
            $error_msg = substr($error_msg, strpos($error_msg, ':') + 1);
            return redirect()->back()->withErrors([
                'Error',
                'Failed to downloa file,',
                'please contact system administrator.',
                'server error:' . $error_msg
            ]);
        }
    }
}
