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
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $project = Project::findOrFail($request->project_id);
        $found_contract = false;
        // -----------------------------------------------------------------
        $found_contract = Contract::where([
            'project_id' => $project->id,
            'contract_type_id' => $request->contract_type_id
        ])->first();
        // dd($found_contract);
        if ($found_contract) {
            return redirect()->back()->withErrors([
                'this contract is allredy created',
                'هذا العقد تم عمله مسبقاً',
            ]);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 1) {
            return $this->design($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 2) {
            return $this->qarar_masahe($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 3) {
            return $this->mahder_tathbeet($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 4) {
            $found_contract = Contract::where([
                'project_id' => $project->id,
                'contract_type_id' => 5,
            ])->first();
            if ($found_contract) {
                return redirect()->back()->withErrors([
                    'there is a full supervision contract for this project',
                    'يوجد عقد اشراف كامل لهذا المشروع',
                ]);
            }
            return $this->supervision($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 5) {
            $found_contract = Contract::where([
                'project_id' => $project->id,
                'contract_type_id' => 4,
            ])->first();
            if ($found_contract) {
                return redirect()->back()->withErrors([
                    'there is a supervision contract for this project',
                    'يوجد عقد اشراف عادي لهذا المشروع',
                ]);
            }
            return $this->supervision_full($project, $request->cost);
        }
        // -----------------------------------------------------------------
    }
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
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
    // -----------------------------------------------------------------------------------------------------------------
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
    public static function get_project_contracts($project)
    {
        $found_contract = Contract::where([
            'project_id' => $project->id,
        ])->get();
        return  $found_contract;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function design($project, $price)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد تصميم';
        $contract_type_id = 1;
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'contract.pdf.design';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        // creating a contract
        $last_contract_no = Contract::max('contract_no');
        $data = [
            'project_id' => $project->id,
            'contract_type_id' => $contract_type_id,
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
        // -----------------------------------------------------------------
        // creating the relationship
        $project->contracts()->attach([$contract->id => [
            'contract_type_id' => $contract_type_id,
            'created_by_id' => auth()->user()->id,
            'created_by_name' => auth()->user()->user_name,
        ]]);
        // $contract->projects()->attach($project);
        // $project->contracts()->sync($contract);

        return redirect()->back()->with('success', 'contract added  تم انشاء العقد بنجاح');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function contract_to_pdf(Request $request, $contract = null)
    {
        $contract = ($contract) ? $contract : Contract::findOrFail($request->contract_id);
        // $contract = Contract::findOrFail($request->contract_id);
        $newPDF = new TCPDF();
        // -----------------------------------------------------------------
        // setting a header and foooter 
        $newPDF = ProjectDocController::set_hakeem_header_footer($newPDF);
        // setting main sittings
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        // pdf title
        $newPDF::SetTitle($contract->contract_type()->first()->name_ar);
        $newPDF::SetSubject($contract->contract_type()->first()->name_ar);
        // -----------------------------------------------------------------
        // override some settings
        if ($contract->contract_type_id == 1) {
            $newPDF::SetFontSize(11);
            $newPDF::setCellHeightRatio(1.4);
        }
        // -----------------------------------------------------------------
        $html = $contract->html;
        $newPDF::writeHTML($html, true, false, true, false, '');
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        // -----------------------------------------------------------------
        return;
        // return redirect()->back();
        // exit;
        // -----------------------------------------------------------------
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function supervision($project, $price)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد اشراف هندسي (عظم ومباني)';
        $contract_type_id = 4;
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        // Content
        $doc_name = 'supervision';
        $pdf_view = 'contract.pdf.supervision';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        // creating a contract
        $last_contract_no = Contract::max('contract_no');
        $data = [
            'project_id' => $project->id,
            'contract_type_id' => $contract_type_id,
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
        // -----------------------------------------------------------------
        // creating the relationship
        $project->contracts()->attach([$contract->id => [
            'contract_type_id' => $contract_type_id,
            'created_by_id' => auth()->user()->id,
            'created_by_name' => auth()->user()->user_name,
        ]]);

        // -----------------------------------------------------------------
        return redirect()->back()->with('success', 'contract added  تم انشاء العقد بنجاح');
        // -----------------------------------------------------------------

    }
    // -----------------------------------------------------------------------------------------------------------------
    public function supervision_full($project, $price)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد اشراف هندسي (كامل)';
        $contract_type_id = 5;
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        // Content
        $doc_name = 'supervision_full';
        $pdf_view = 'contract.pdf.supervision_full';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        // creating a contract
        $last_contract_no = Contract::max('contract_no');
        $data = [
            'project_id' => $project->id,
            'contract_type_id' => $contract_type_id,
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
        // -----------------------------------------------------------------
        // creating the relationship
        $project->contracts()->attach([$contract->id => [
            'contract_type_id' => $contract_type_id,
            'created_by_id' => auth()->user()->id,
            'created_by_name' => auth()->user()->user_name,
        ]]);

        // -----------------------------------------------------------------
        return redirect()->back()->with('success', 'contract added  تم انشاء العقد بنجاح');
        // -----------------------------------------------------------------
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function qarar_masahe($project, $price)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد خدمات هندسية (اصدار قرار مساحي)';
        $contract_type_id = 2;
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        // Content
        $doc_name = 'qarar_masahe';
        $pdf_view = 'contract.pdf.qarar_masahe';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        // creating a contract
        $last_contract_no = Contract::max('contract_no');
        $data = [
            'project_id' => $project->id,
            'contract_type_id' => $contract_type_id,
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
        // -----------------------------------------------------------------
        // creating the relationship
        $project->contracts()->attach([$contract->id => [
            'contract_type_id' => $contract_type_id,
            'created_by_id' => auth()->user()->id,
            'created_by_name' => auth()->user()->user_name,
        ]]);
        // -----------------------------------------------------------------
        return redirect()->back()->with('success', 'contract added  تم انشاء العقد بنجاح');
        // -----------------------------------------------------------------
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function mahder_tathbeet($project, $price)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_tame($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد خدمات هندسية (تثبيت موقع)';
        $contract_type_id = 3;
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'project_tame' => $project_tame,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        // Content
        $doc_name = 'mahder_tathbeet';
        $pdf_view = 'contract.pdf.mahder_tathbeet';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        // creating a contract
        $last_contract_no = Contract::max('contract_no');
        $data = [
            'project_id' => $project->id,
            'contract_type_id' => $contract_type_id,
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
        // -----------------------------------------------------------------
        // creating the relationship
        $project->contracts()->attach([$contract->id => [
            'contract_type_id' => $contract_type_id,
            'created_by_id' => auth()->user()->id,
            'created_by_name' => auth()->user()->user_name,
        ]]);
        // ----------------------------------------------------------------- هذا الأمر ماشي بس ما يعمل ريفرش للصفحة
        // return redirect()->route('contract.contract_to_pdf', [
        //     'contract_id' => $contract->id
        // ]);
        // -----------------------------------------------------------------
        return redirect()->back()->with('success', 'contract added  تم انشاء العقد بنجاح');
        // -----------------------------------------------------------------
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
