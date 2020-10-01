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
    public function design(Request $request)
    {
        $price = 4000;
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
        ];
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.design';

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
        // override some settings
        $newPDF::SetFontSize(11);
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($doc_name . '.pdf');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function supervision(Request $request)
    {
        $price = 4000;
        $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
        ];
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.supervision';

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
        // override some settings
        // $newPDF::SetFontSize(11);
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($doc_name . '.pdf');
        exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_payment_arr($price)
    {
        // $table->decimal('cost', 12, 2)->nullable();
        // $table->decimal('vat_percentage', 12, 2)->nullable();
        // $table->decimal('vat_value', 12, 2)->nullable();
        // $table->decimal('price_withe_vat', 12, 2)->nullable();
        // // -----------------------------
        // $table->decimal('tax_1', 12, 2)->nullable();
        // $table->decimal('tax_2', 12, 2)->nullable();
        // $table->decimal('tax_3', 12, 2)->nullable();
        // $table->decimal('tax_4', 12, 2)->nullable();
        // $table->decimal('tax_5', 12, 2)->nullable();
        // $table->decimal('price_withe_vat_and_taxes', 12, 2)->nullable();
        // // -----------------------------
        // $table->decimal('visit_fee', 12, 2)->nullable();
        // $table->decimal('monthly_fee', 12, 2)->nullable();

        $cost = $price;
        $vat_percentage = '15';
        $vat_value = $price * $vat_percentage / 100;
        $price_withe_vat = $vat_value + $cost;
        $pyment_1 = $cost * 0.5;
        $pyment_1_vat = $vat_value * 0.5;
        $pyment_1_with_vat = $price_withe_vat * 0.5;
        $pyment_2 = $cost * 0.35;
        $pyment_2_vat = $vat_value * 0.35;
        $pyment_2_with_vat = $price_withe_vat * 0.35;
        $pyment_3 = $cost - ($pyment_1 + $pyment_2);
        $pyment_3_vat = $vat_value - ($pyment_1_vat + $pyment_2_vat);
        $pyment_3_with_vat = $price_withe_vat - ($pyment_1_with_vat + $pyment_2_with_vat);


        $pyment_arr = [];
        $pyment_arr['cost'] = ($cost) ? $cost : null;
        $pyment_arr['vat_percentage'] = ($vat_percentage) ? $vat_percentage : null;
        $pyment_arr['vat_value'] = ($vat_value) ? $vat_value : null;
        $pyment_arr['price_withe_vat'] = ($price_withe_vat) ? $price_withe_vat : null;
        $pyment_arr['pyment_1'] = ($pyment_1) ? $pyment_1 : null;
        $pyment_arr['pyment_1_vat'] = ($pyment_1_vat) ? $pyment_1_vat : null;
        $pyment_arr['pyment_1_with_vat'] = ($pyment_1_with_vat) ? $pyment_1_with_vat : null;
        $pyment_arr['pyment_2'] = ($pyment_2) ? $pyment_2 : null;
        $pyment_arr['pyment_2_vat'] = ($pyment_2_vat) ? $pyment_2_vat : null;
        $pyment_arr['pyment_2_with_vat'] = ($pyment_2_with_vat) ? $pyment_2_with_vat : null;
        $pyment_arr['pyment_3'] = ($pyment_3) ? $pyment_3 : null;
        $pyment_arr['pyment_3_vat'] = ($pyment_3_vat) ? $pyment_3_vat : null;
        $pyment_arr['pyment_3_with_vat'] = ($pyment_3_with_vat) ? $pyment_3_with_vat : null;

        return $pyment_arr;
    }
}
