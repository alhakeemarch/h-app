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
        // dd($found_contract);
        if ($found_contract) {
            return redirect()->back()->withErrors([
                'this contract is allredy created',
                'هذا العقد تم عمله مسبقاً',
            ]);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 1) {
            $contract_data = $this->design($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 2) {
            $contract_data =  $this->qarar_masahe($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 3) {
            $contract_data =  $this->mahder_tathbeet($project, $request->cost);
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
            $contract_data =  $this->supervision($project, $request->cost);
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
            $contract_data =  $this->supervision_full($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 6) {
            $contract_data =  $this->elevation_3d($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 7) {
            $contract_data =  $this->safety_design($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($request->contract_type_id == 32) {
            $contract_data =  $this->boq($project, $request->cost);
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
        $request->validate([
            'cost' => 'required|numeric',
        ]);
        // -----------------------------------------------------------------
        $old_price = $contract->cost;
        $new_price = $request->cost;
        $project = Project::findOrFail($contract->project_id);
        $edit = true;
        $data = [];
        // -----------------------------------------------------------------
        if ($contract->contract_type_id == 1) {
            $data = $this->design($project, $request->cost, $edit);
        }
        // -----------------------------------------------------------------
        if ($contract->contract_type_id == 2) {
            $data = $this->qarar_masahe($project, $request->cost, $edit);
        }
        // -----------------------------------------------------------------
        if ($contract->contract_type_id == 3) {
            $data = $this->mahder_tathbeet($project, $request->cost, $edit);
        }
        // -----------------------------------------------------------------
        if ($contract->contract_type_id == 4) {

            $data = $this->supervision($project, $request->cost, $edit);
        }
        // -----------------------------------------------------------------
        if ($contract->contract_type_id == 5) {
            $data = $this->supervision_full($project, $request->cost, $edit);
        }
        // -----------------------------------------------------------------
        if ($contract->contract_type_id == 6) {
            $data =  $this->elevation_3d($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($contract->contract_type_id == 7) {
            $data =  $this->safety_design($project, $request->cost);
        }
        // -----------------------------------------------------------------
        if ($contract->contract_type_id == 32) {
            $data =  $this->boq($project, $request->cost);
        }
        // -----------------------------------------------------------------
        $contract->update($data);
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
        return redirect()->route('project.show', $project)->with('success', 'contract edited successfully - تم تعديل العقد بنجاح');
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
    public static function get_quick_form_contracts()
    {
        return [
            'عقد تصميم',
            'عقد قرار مساحي',
            'عقد محضر تثبيت',
            'عقد اشراف عظم',
            'عقد اشراف كامل',
            'عقد تصميم واجهة ثلاثية الابعاد',
            'عقد تصميم سلامة',
            'عقد حصر كميات',
        ];
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function contract_to_pdf(Request $request, $contract = null)
    {
        $contract = ($contract) ? $contract : Contract::findOrFail($request->contract_id);
        // -----------------------------------------------------------------
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
        if ($contract->contract_type_id == 7) {
            $newPDF::SetFontSize(12);
            $newPDF::setCellHeightRatio(1.4);
        }
        // -----------------------------------------------------------------
        $html = $contract->html;
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
        $newPDF::SetFont('helvetica', '', 8);
        $newPDF::SetTextColor(0, 0, 0, 25);;
        $newPDF::Cell(0, 0, $text, 0, 0, 'C', 0, '', 0, false, 'B', 'B');
        $newPDF::StopTransform();
        // -----------------------------------------------------------------
        $newPDF::lastPage();
        $newPDF::Output(date_format(now(), 'yymd_His') . '.pdf', 'D');
        // -----------------------------------------------------------------
        return;
        // return redirect()->back();
        // exit;
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
        $contract_type_id = $contract->contract_type_id;
        $contract_title = $contract->contract_type()->first()->name_ar;
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
    public function design($project, $price, $edit = false)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد تصميم';
        $contract_type_id = 1;
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        // Content
        $pdf_view = 'contract.pdf.design';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        if ($edit) {
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
    public function boq($project, $price, $edit = false)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد خدمات هندسية (حصر كميات)';
        $contract_type_id = 32;
        $pdf_data = [
            'project' => $project,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
            'pyment_arr' => $pyment_arr,
            'contract_title' => $contract_title,
        ];
        // -----------------------------------------------------------------
        // Content
        $pdf_view = 'contract.pdf.boq';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        if ($edit) {
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
            // creating a contract
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

    public function supervision($project, $price, $edit = false)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_team($project);
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
        $pdf_view = 'contract.pdf.supervision';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        if ($edit) {
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
            // creating a contract
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
    public function supervision_full($project, $price, $edit = false)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_team($project);
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
        $pdf_view = 'contract.pdf.supervision_full';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        // -----------------------------------------------------------------
        if ($edit) {
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
            // creating a contract
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
    public function qarar_masahe($project, $price, $edit = false)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_team($project);
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
        $pdf_view = 'contract.pdf.qarar_masahe';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        if ($edit) {
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
            // creating a contract
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
    public function mahder_tathbeet($project, $price, $edit = false)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_team($project);
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
        $pdf_view = 'contract.pdf.mahder_tathbeet';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        if ($edit) {
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
            // creating a contract
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
    public function elevation_3d($project, $price, $edit = false)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_team($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد تصميم منظور خارجي';
        $contract_type_id = 6;
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
        $pdf_view = 'contract.pdf.elevation_3d';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        if ($edit) {
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
            // creating a contract
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
    public function safety_design($project, $price, $edit = false)
    {
        // -----------------------------------------------------------------
        $office_data = OfficeData::findOrFail(1);
        $project_tame = ProjectController::get_project_team($project);
        $date_and_time = DateAndTime::get_date_time_arr();
        $pyment_arr = self::get_payment_arr($price);
        $contract_title = 'عقد تصميم مخططات سلامة';
        $contract_type_id = 7;
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
        $pdf_view = 'contract.pdf.safety_design';
        // -----------------------------------------------------------------
        // View
        $the_view = View::make($pdf_view)->with($pdf_data);
        $html = $the_view->render();
        // -----------------------------------------------------------------
        if ($edit) {
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
            // creating a contract
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
