<?php

namespace App\Http\Controllers;

use App\Contract;
use App\OfficeData;
use App\Project;
use DateTime;
use PDF as TCPDF;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contract.index');
        // return 'this is contract controller / index method';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function design_contract(Request $request)
    {
        // return view('contract.design_contract');

        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
        ];
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.design_contract';

        // creating pdf 
        $newPDF = new TCPDF();
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = ProjectDocController::set_hakeem_header_footer($newPDF);
        // setting main sittings
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('عقد تصميم');
        $newPDF::SetSubject('عقد تصميم');
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();

        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($doc_name . '.pdf');
        exit;
    }
}
