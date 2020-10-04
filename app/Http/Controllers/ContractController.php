<?php

namespace App\Http\Controllers;

use App\Contract;
use App\ContractType;
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
        return redirect()->back()->withErrors(['erooooor']);
        $project = Project::findOrFail($request->project_id);

        $contract_types = ContractType::all();
        $all_contracts = [];
        foreach ($request->all() as $key => $value) {
            foreach ($contract_types as $contract_type) {
                if (substr($key, 6) == $contract_type->id) {
                    $all_contracts[$contract_type->id] = $value;
                }
            }
        }
        foreach ($all_contracts as $contract_id => $cost) {
            if ($cost > 0) {
                if ($contract_id == 1) {
                    return redirect()->back()->withErrors(['erooddoor']);
                    $this->design($project, $cost);
                }
                // if ($contract_id == 2) {
                //     $this->qarar_masahe($project, $cost);
                // }
                // if ($contract_id == 3) {
                //     $this->mahder_tathbeet($project, $cost);
                // }
                // if ($contract_id == 4) {
                //     $this->supervision($project, $cost);
                // }
                // if ($contract_id == 5) {
                //     $this->supervision_full($project, $cost);
                // }
                // if ($contract_id == 6) {
                //     // $this->elevation_3d($project, $cost);
                // }
                // if ($contract_id == 7) {
                //     // $this->safety($project, $cost);
                // }
            }
        }
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
    public function design($project, $price)
    {
        // $price = 6956.5;
        // $project = Project::findOrFail($request->project_id);
        // -----------------------------------------------------------------
        $found_contract = false;
        $found_contract = Contract::where(['project_id' => $project->id, 'contract_type_id' => 1])->get();
        if ($found_contract) {
            return redirect()->action(
                'ProjectController@show',
                ['project' => $project]
            )->withErrors([
                'this contract is allredy created',
                'هذا العقد تم عمله مسبقاً',
            ]);
        }

        return redirect()->action(
            'ProjectController@create',
            ['person' => $found_person, 'plot' => $found_plot]
        );

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
            'contract_title' => 'عقد تصميم',
        ];
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.pdf.design';

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
        $newPDF::setCellHeightRatio(1.4);
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();

        // =========================================================================================



        $last_contract_no = Contract::max('contract_no');
        $data = [
            'project_id' => $project->id,
            'contract_type_id' => 1, // عقد التصميم دائماً 1
            'contract_no' => 1,
            'contract_no' => $last_contract_no + 1,
            'cost' => $pyment_arr['cost'],
            'vat_percentage' => $pyment_arr['vat_percentage'],
            'vat_value' => $pyment_arr['vat_value'],
            'price_withe_vat' => $pyment_arr['price_withe_vat'],
            'date' => $date_and_time['g_date_en'],
            'html' => $html,
            'created_by_id' => auth()->user()->id,
            'created_by_name' => auth()->user()->user_name,
        ];
        $contract = Contract::create($data);




        // $contract->projects()->attach($project);
        // $project->contracts()->sync($contract);


        // $project->contracts()->attach($contract);
        $project->contracts()->attach([$contract->id => [
            'contract_type_id' => 1,
            'created_by_id' => auth()->user()->id,
            'created_by_name' => auth()->user()->user_name,
        ]]);
        return 'hi';

        // $project->contracts();

        // return $contract->projects()->first();
        // return $project->contracts()->first();


        // --------------------------------------------------------------------------------------

        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($doc_name . '.pdf', 'D');
        // exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function supervision($project, $price)
    {
        // $price = 4000;
        // $project = Project::findOrFail($request->project_id);
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
            'contract_title' => 'عقد اشراف هندسي (عظم ومباني)',
        ];
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.pdf.supervision';

        // creating pdf 
        $newPDF = new TCPDF();
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = ProjectDocController::set_hakeem_header_footer($newPDF);
        // setting main sittings
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle('عقد اشراف هندسي (عظم ومباني)');
        $newPDF::SetSubject('عقد اشراف هندسي (عظم ومباني)');
        // -----------------------------------------------------------------
        // override some settings
        // $newPDF::SetFontSize(11);
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($doc_name . '.pdf', 'D');
        // exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function supervision_full($project, $price)
    {
        // $price = 13000; // from user
        // $visit_fee = 1000; // from user
        // $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        // $pyment_arr = self::get_payment_arr($price, $visit_fee);
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد اشراف هندسي كامل';
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.pdf.supervision_full';

        // creating pdf 
        $newPDF = new TCPDF();
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = ProjectDocController::set_hakeem_header_footer($newPDF);
        // setting main sittings
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle($contract_title);
        $newPDF::SetSubject($contract_title);
        // -----------------------------------------------------------------
        // override some settings
        // $newPDF::SetFontSize(11);
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($doc_name . '.pdf', 'D');
        // exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function qarar_masahe($project, $price)
    {
        // $price = 13000; // from user
        // $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد خدمات هندسية (اصدار قرار مساحي)';
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.pdf.qarar_masahe';

        // creating pdf 
        $newPDF = new TCPDF();
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = ProjectDocController::set_hakeem_header_footer($newPDF);
        // setting main sittings
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle($contract_title);
        $newPDF::SetSubject($contract_title);
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($doc_name . '.pdf', 'D');
        // exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function mahder_tathbeet($project, $price)
    {
        // $price = 1000; // from user
        // $project = Project::findOrFail($request->project_id);
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد خدمات هندسية (تثبيت موقع)';
        $data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.pdf.mahder_tathbeet';

        // creating pdf 
        $newPDF = new TCPDF();
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = ProjectDocController::set_hakeem_header_footer($newPDF);
        // setting main sittings
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle($contract_title);
        $newPDF::SetSubject($contract_title);
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output($doc_name . '.pdf', 'D');
        // exit;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_payment_arr($price, $visit_fee = null)
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

        $cost = round($price, 1);
        $vat_percentage = '15';
        $vat_value = round($price * $vat_percentage / 100, 0);
        // $price_withe_vat = $vat_value + $cost;
        $price_withe_vat = ceil($vat_value + $cost); // للتقريب لأعلى رقم صحيح

        $pyment_1 = ceil($cost * 0.5);
        $pyment_1_vat =  ceil($vat_value * 0.5);
        // $pyment_1_with_vat = round( $price_withe_vat * 0.5;
        $pyment_1_with_vat = ceil($price_withe_vat * 0.5); // للتقريب لأعلى رقم صحيح
        $pyment_1_with_total_vat = ceil($pyment_1 + $vat_value); // للتقريب لأعلى رقم صحيح

        $pyment_2 =  ceil($cost * 0.35);
        $pyment_2_vat =  ceil($vat_value * 0.35);
        // $pyment_2_with_vat = round( $price_withe_vat * 0.35,1);
        $pyment_2_with_vat = ceil($price_withe_vat * 0.35);  // للتقريب لأعلى رقم صحيح

        $pyment_3 = ceil($cost - ($pyment_1 + $pyment_2));
        $pyment_3_vat = ceil($vat_value - ($pyment_1_vat + $pyment_2_vat));
        $pyment_3_with_vat = ceil($price_withe_vat - ($pyment_1_with_vat + $pyment_2_with_vat));

        $visit_fee =  round(($visit_fee) ? $visit_fee : 1000, 1); // if no viset fee it well set as 1000 SAR
        $visit_fee_vat = round($visit_fee * $vat_percentage / 100, 1);
        $visit_fee_with_vat = round($visit_fee + $visit_fee_vat, 1);

        // --------------------------------------------------------------------------------------------
        // I18N_Arabic_Numbers
        $ar_num  = new \App\I18N_Arabic_Numbers();
        $cost_text = $ar_num->money2str($cost, 'SAR');
        $price_withe_vat_text = $ar_num->money2str($price_withe_vat, 'SAR');
        $visit_fee_with_vat_text = $ar_num->money2str($visit_fee_with_vat, 'SAR');



        // --------------------------------------------------------------------------------------------







        $pyment_arr = [];
        $pyment_arr['cost'] = ($cost) ? $cost : null;
        $pyment_arr['cost_text'] = ($cost_text) ? $cost_text : null;
        $pyment_arr['vat_percentage'] = ($vat_percentage) ? $vat_percentage : null;
        $pyment_arr['vat_value'] = ($vat_value) ? $vat_value : null;
        $pyment_arr['price_withe_vat'] = ($price_withe_vat) ? $price_withe_vat : null;
        $pyment_arr['price_withe_vat_text'] = ($price_withe_vat_text) ? $price_withe_vat_text : null;
        $pyment_arr['pyment_1'] = ($pyment_1) ? $pyment_1 : null;
        $pyment_arr['pyment_1_vat'] = ($pyment_1_vat) ? $pyment_1_vat : null;
        $pyment_arr['pyment_1_with_vat'] = ($pyment_1_with_vat) ? $pyment_1_with_vat : null;
        $pyment_arr['pyment_1_with_total_vat'] = ($pyment_1_with_total_vat) ? $pyment_1_with_total_vat : null;
        $pyment_arr['pyment_2'] = ($pyment_2) ? $pyment_2 : null;
        $pyment_arr['pyment_2_vat'] = ($pyment_2_vat) ? $pyment_2_vat : null;
        $pyment_arr['pyment_2_with_vat'] = ($pyment_2_with_vat) ? $pyment_2_with_vat : null;
        $pyment_arr['pyment_3'] = ($pyment_3) ? $pyment_3 : null;
        $pyment_arr['pyment_3_vat'] = ($pyment_3_vat) ? $pyment_3_vat : null;
        $pyment_arr['pyment_3_with_vat'] = ($pyment_3_with_vat) ? $pyment_3_with_vat : null;

        $pyment_arr['visit_fee'] = ($visit_fee) ? $visit_fee : null;
        $pyment_arr['visit_fee_vat'] = ($visit_fee_vat) ? $visit_fee_vat : null;
        $pyment_arr['visit_fee_with_vat'] = ($visit_fee_with_vat) ? $visit_fee_with_vat : null;
        $pyment_arr['visit_fee_with_vat_text'] = ($visit_fee_with_vat_text) ? $visit_fee_with_vat_text : null;


        return $pyment_arr;
    }
}
