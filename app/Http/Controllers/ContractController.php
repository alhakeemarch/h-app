<?php

namespace App\Http\Controllers;

use App\Contract;
use App\ContractType;
use App\OfficeData;
use App\Project;
use DateTime;
// use PDF as TCPDF;
use Elibyy\TCPDF\Facades\TCPDF as TCPDF;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;

class ContractController extends Controller
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

        // $this->authorizeResource(Person::class, 'person');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::all()->reverse();
        return view('contract.index')->with(['contracts' => $contracts]);
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
        $request->validate([
            'cost' => 'required|numeric',
            'contract_type_id' => 'required|numeric',
        ]);
        // -----------------------------------------------------------------
        $project = Project::findOrFail($request->project_id);
        $found_contract = false;
        $contract_data = [];
        // -----------------------------------------------------------------
        $found_contract = Contract::where([
            'project_id' => $project->id,
            'contract_type_id' => $request->contract_type_id
        ])->first();
        if ($found_contract) {
            return redirect()->back()->withErrors([
                'this contract is allredy created',
                'هذا العقد تم عمله مسبقاً',
            ]);
        }
        // -----------------------------------------------------------------
        $contract_data = $this->get_contract_data($request->contract_type_id, $project, $request->cost);
        if (isset($contract_data['erorr'])) {
            return redirect()->back()->withErrors($contract_data['erorr']);
        }
        // -----------------------------------------------------------------
        $contract = Contract::create($contract_data);
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'contracts',
            'model' => 'Contract',
            'model_id' => $contract->id,
            'action' => 'create',
            'description' => 'new contract' . $contract->contract_type()->first()->name_ar
                . ' => added to project with id= ' . $project->id . ', by cost = ' . $contract->cost,
        ];
        DbLogController::add_record($db_record_data);

        return redirect()->back()->with('success', 'contract added  تم انشاء العقد بنجاح');
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
        return view('contract.show')->with(['contract' => $contract]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract, Request $request)
    {
        return view('contract.edit')->with(['contract' => $contract]);
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
        if ($request->add_or_remove_form_quotation) {
            $contract->is_in_quotation = !($contract->is_in_quotation);
            $contract->save();
            return redirect()->back();
        }
        // -----------------------------------------------------------------
        if ($request->add_or_remove_form_invoice) {
            $contract->is_in_invoice = !($contract->is_in_invoice);
            $contract->save();
            return redirect()->back();
        }
        // -----------------------------------------------------------------
        $request->validate([
            'cost' => 'required|numeric',
        ]);
        // -----------------------------------------------------------------
        $old_price = $contract->cost;
        $new_price = $request->cost;
        $project = Project::findOrFail($contract->project_id);
        $edit = true;

        // -----------------------------------------------------------------
        $contract_data = $this->get_contract_data($contract->contract_type_id, $project, $request->cost, $edit);
        if (isset($contract_data['erorr'])) {
            return redirect()->back()->withErrors($contract_data['erorr']);
        }
        // -----------------------------------------------------------------
        $contract->update($contract_data);
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'contracts',
            'model' => 'Contract',
            'model_id' => $contract->id,
            'action' => 'update',
            'description' => 'price of contract withe id = ' . $contract->id . 'from =' . $old_price . '=> to= ' . $new_price,
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->route('project.show', $project)->with('success', 'contract edited successfully - تم تعديل العقد بنجاح');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contract $contract)
    {
        if ($contract->invoice_id) {
            return redirect()->back()->withErrors([
                'can NOT delete the contract after issuing an invoice', 'لا يمكن حذف الفاتورة بعد صدور فاتورة ضريبية عليها'
            ]);
        }
        $old_record = $contract->get_record_as_str();
        $contract->delete();
        $db_record_data = [
            'table' => 'contracts',
            'model' => 'Contract',
            'model_id' => $contract->id,
            'action' => 'soft_delete',
            'description' => 'contract withe id = ' . $contract->id . ' deleted',
            'old_record' => $old_record,
        ];
        DbLogController::add_record($db_record_data);

        return redirect()->back()->with('success', 'contract deleted successfully - تم حذف العقد بنجاح');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_project_contracts($project)
    {
        $found_contract = Contract::where([
            'project_id' => $project->id,
        ])->get()->sortBy('contract_type_id');
        return  $found_contract;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_project_contracts_for_quotation($project)
    {
        $found_contract = Contract::where([
            'project_id' => $project->id,
            'is_in_quotation' => 1,
        ])->get()->sortBy('contract_type_id');
        return  $found_contract;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_project_contracts_for_invoice($project)
    {
        $found_contract = Contract::where([
            'project_id' => $project->id,
            'invoice_id' => NULL,
            'is_in_invoice' => 1,
        ])->get()->sortBy('contract_type_id');
        return  $found_contract;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_project_contracts_arr($project)
    {
        $project_contracts = self::get_project_contracts($project);
        // return $project_contracts;
        $project_contracts_arr = [];
        foreach ($project_contracts as $contract) {
            $project_contracts_arr['id'] = $contract->id;
        }
        return $project_contracts_arr;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function get_new_contract_no()
    {
        $contract = new Contract;
        return ($contract->withTrashed()->get()->max('contract_no')) + 1;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function contract_to_pdf(Request $request, $contract = null)
    {
        $contract = ($contract) ? $contract : Contract::findOrFail($request->contract_id);
        // -----------------------------------------------------------------
        $newPDF = new TCPDF();
        // -----------------------------------------------------------------
        $newPDF = ProjectDocController::set_hakeem_header_footer($newPDF);
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        $newPDF::SetTitle($contract->contract_type()->first()->name_ar);
        $newPDF::SetSubject($contract->contract_type()->first()->name_ar);
        // -----------------------------------------------------------------
        $html = $contract->html;
        $newPDF::AddPage('P', 'A4');
        $newPDF::writeHTML($html, true, false, true, false, '');
        // -----------------------------------------------------------------
        // to print contract no and user id and contract creator id 
        $text = 'Code="Cn' . $contract->contract_no
            . '-Up' . auth()->user()->id
            . '-P' . $contract->project_id
            . '-Uc' . $contract->created_by_id
            . '-Ue' . $contract->last_edit_by_id . '"';

        // -----------------------------------------------------------------
        $newPDF::SetY(150);
        $newPDF::SetX(198);
        $newPDF::StartTransform();
        $newPDF::Rotate(+90);
        $newPDF::SetFont('consolas', '', 8);
        $newPDF::SetTextColor(0, 0, 0, 35);;
        $newPDF::Cell(0, 0, $text, 0, 0, 'C', 0, '', 0, false, 'B', 'B');
        $newPDF::StopTransform();
        // -----------------------------------------------------------------
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'Ymd_His') . '.pdf', 'D');
        // -----------------------------------------------------------------
        $contract->print_count = $contract->print_count + 1;
        $contract->save();
        // -----------------------------------------------------------------
        return redirect()->back();
        // -----------------------------------------------------------------
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function re_render_contract(Request $request)
    {
        $contract = Contract::findOrFail($request->contract_id);
        $project = Project::findOrFail($contract->project_id);
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr($contract->date);
        $pyment_arr = self::get_payment_arr($contract->cost);
        $contract_title = 'عقد تقديم خدمات إستشارات هندسية (' . $contract->contract_type()->first()->name_ar . ')';
        $pdf_view = $contract->contract_type()->first()->view_template;
        // -----------------------------------------------------------------
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        $data = [
            'html' => $html,
            'last_edit_by_id' => auth()->user()->id,
            'last_edit_by_name' => auth()->user()->user_name,
        ];
        $contract->update($data);
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'contracts',
            'model' => 'Contract',
            'model_id' => $contract->id,
            'action' => 'update',
            'description' => 'contract re renderd',
        ];
        DbLogController::add_record($db_record_data);
        return redirect()->route('project.show', $project)->with('success', 'contract refreshed successfully - تم تحديث العقد بنجاح');
    }

    // -----------------------------------------------------------------------------------------------------------------
    public static function get_payment_arr($price, $visit_fee = null)
    {
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
    // -----------------------------------------------------------------------------------------------------------------
    private function get_contract_data($contract_type_id, $project, $cost, $is_edit = false)
    {
        // -------------------------------------------------------------------
        if ($contract_type_id == 4) {
            $found_contract = Contract::where([
                'project_id' => $project->id,
                'contract_type_id' => 5,
            ])->first();
            if (isset($found_contract->id)) {
                $data = ['erorr' => [
                    'there is a full supervision contract for this project',
                    'يوجد عقد اشراف كامل لهذا المشروع',
                ]];
                return $data;
            }
        }
        // -------------------------------------------------------------------
        if ($contract_type_id == 5) {
            $found_contract = Contract::where([
                'project_id' => $project->id,
                'contract_type_id' => 4,
            ])->first();
            if (isset($found_contract->id)) {
                $data = ['erorr' => [
                    'there is a supervision contract for this project',
                    'يوجد عقد اشراف عظم لهذا المشروع',
                ]];
                return $data;
            }
        }
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($cost);
        $contract_type = ContractType::find($contract_type_id);
        $contract_title = 'عقد تقديم خدمات إستشارات هندسية (' . $contract_type->name_ar . ')';
        $contract_type_id = $contract_type->id;
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        if (!isset($contract_type->view_template)) {
            $data = ['erorr' => [
                'contract not found. contact system admin',
                'لم يتم العثور على العقد، يرجى التواصل مع مسؤول النظام'
            ]];
            return $data;
        }
        // -----------------------------------------------------------------
        // Content
        $pdf_view = $contract_type->view_template;
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        if ($is_edit) {
            $data = [
                'cost' => $pyment_arr['cost'],
                'vat_percentage' => $pyment_arr['vat_percentage'],
                'vat_value' => $pyment_arr['vat_value'],
                'price_withe_vat' => $pyment_arr['price_withe_vat'],
                'date' => $date_and_time['g_date_en'],
                'html' => $html,
                'last_edit_by_id' => auth()->user()->id,
                'last_edit_by_name' => auth()->user()->user_name,
            ];
            return $data;
        } else {
            $new_contract_no = self::get_new_contract_no();
            $data = [
                'project_id' => $project->id,
                'contract_type_id' => $contract_type_id,
                'contract_no' => $new_contract_no,
                'cost' => $pyment_arr['cost'],
                'vat_percentage' => $pyment_arr['vat_percentage'],
                'vat_value' => $pyment_arr['vat_value'],
                'price_withe_vat' => $pyment_arr['price_withe_vat'],
                'date' => $date_and_time['g_date_en'],
                'html' => $html,
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ];
            return $data;
        }
    }
    // -----------------------------------------------------------------------------------------------------------------

}
