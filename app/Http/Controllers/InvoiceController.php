<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Invoice;
use App\InvoiceItem;
use App\Project;
use App\OfficeData;
use App\Organization;
use App\Person;
use App\ProjectBeneficiary;
use App\ProjectService;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF as TCPDF;
use \Illuminate\Support\Facades\View;

class InvoiceController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view-any', Invoice::class);
        return view('invoice.index')->with([
            'invoices' => Invoice::all()->reverse(),
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('view-any', Invoice::class);
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
        // return $request;
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        if (strtotime('now') >= strtotime('04-12-2021')) {
            return redirect()->back()->withErrors(['Cannot Issue An Invoice after 4 December 2021', 'عفواً لا يمكن اصدار فاتورة بعد 4 ديسمبر 2021']);
        }
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $this->authorize('view-any', Invoice::class);
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $project = Project::findOrFail($request->project_id);
        $date_and_time = DateAndTime::get_date_time_arr();
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $invoice = new Invoice;
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $invoice = $this->set_beneficiary_info($invoice, $project, $request->invoice_beneficiary);
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $invoice->invoice_no = $this->get_new_invoice_no();
        $invoice->invoice_no_prefix = $date_and_time['g_year_no'];
        $invoice->project_id = $project->id;
        if ($project->person_id) $invoice->person_id = $project->person->id;
        if ($project->organization_id) $invoice->organization_id = $project->organization_id;
        $invoice->issued_by_id = auth()->user()->id;
        if ($request->credit_or_cash == 'cash') {
            $invoice->is_credit = false;
            $invoice->is_cash = true;
        } else {
            $invoice->is_credit = true;
            $invoice->is_cash = false;
        }
        $invoice->h_date = $date_and_time['h_date_en'];
        $invoice->g_date = $date_and_time['g_date_en'];
        $invoice->notes = $request->notes;
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $total_arr = $this->get_total_array($project);
        if (count($total_arr['contracts_id']) < 1 && count($total_arr['project_services_id']) < 1) {
            return redirect()->back()->withErrors([
                'No Contracts Or Services available to add in invoice', 'لايوجد عقود أو خدمات متاحة للفوترة'
            ]);
        }
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $invoice->total_cost = $total_arr['total_cost'];
        $invoice->vat_percentage = $total_arr['vat_percentage'];
        $invoice->total_vat_value = $total_arr['total_vat'];
        $invoice->total_price_withe_vat = $total_arr['total_price_withe_vat'];
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $invoice->created_by_id = auth()->user()->id;
        $invoice->save();
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $this->create_invoice_items($total_arr['contracts_id'], $total_arr['project_services_id'], $invoice->id);
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        // add record to db_log
        $db_record_data = [
            'table' => 'invoices',
            'model' => 'Invoice',
            'model_id' => $invoice->id,
            'action' => 'create',
            'description' => 'new invoice created',
        ];
        DbLogController::add_record($db_record_data);
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $success_msg = ['invoive created successfully', 'تم اضافة انشاء الفاتورة بنجاح'];
        return redirect()->back()->with('success', $success_msg);
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $this->authorize('view-any', Invoice::class);
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $this->authorize('view-any', Invoice::class);
        $project = Project::find($invoice->project_id);
        return view('invoice.edit')->with([
            'invoice' => $invoice,
            'beneficiaries_list' => (new ProjectController)->get_project_beneficiaries($project),
            'project' => Project::find($invoice->project_id),
            'project_services' => ProjectService::where('project_id', $invoice->project_id)->where('invoice_id', $invoice->id)->get(),
        ]);
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $this->authorize('view-any', Invoice::class);
        if ($request->form_action == 'refresh_beneficiary_info') {
            $invoice = $this->set_beneficiary_info($invoice);
            $invoice->save();
            return redirect()->back()->withSuccess(['Beneficiary Information updated', 'تم تحديث بيانات المستفيد بنجاح']);
        }
        if ($request->form_action == 'edit_invoice_info') {
            if ($invoice->beneficiary_row_value != $request->invoice_beneficiary) {
                $invoice = $this->set_beneficiary_info($invoice, null, $request->invoice_beneficiary);
            }
            if ($request->credit_or_cash == 'credit') {
                $invoice->is_credit = true;
                $invoice->is_cash = false;
            } else {
                $invoice->is_credit = false;
                $invoice->is_cash = true;
            }
            if ($invoice->notes != $request->notes) {
                $invoice->notes = $request->notes;
            }
            $invoice_date_and_time = DateAndTime::get_date_time_arr($invoice->g_date);
            $request_date_and_time = DateAndTime::get_date_time_arr($request->g_date);
            if ($invoice_date_and_time['g_date_en'] != $request_date_and_time['g_date_en']) {
                $invoice->g_date = $request_date_and_time['g_date_en'];
                $invoice->h_date = $request_date_and_time['h_date_en'];
            }
            $invoice->save();
            // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
            // add record to db_log
            $db_record_data = [
                'table' => 'invoices',
                'model' => 'Invoice',
                'model_id' => $invoice->id,
                'action' => 'update',
                'description' => 'invoice edited',
            ];
            DbLogController::add_record($db_record_data);
            // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
            return redirect()->back()->withSuccess(['invoice updated Successfully', 'تم تعديل الفاتورة بنجاح']);
        }
        // return $request;
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $this->authorize('view-any', Invoice::class);
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    private function get_new_invoice_no()
    {
        $invoice = new Invoice;
        return ($invoice->withTrashed()->get()->max('invoice_no')) + 1;
    }
    // -----------------------------------------------------------------------------------------------------------------
    private function get_total_array($project, $invoice = null)
    {
        if (isset($invoice)) {
            $project_contracts = Contract::where([
                'invoice_id' => $invoice->id,
            ])->get();
            $project_services = ProjectService::where([
                'invoice_id' => $invoice->id,
            ])->get();
        } else {
            $project_contracts = ContractController::get_project_contracts_for_invoice($project);
            $project_services = ProjectService::where([
                'project_id' => $project->id,
                'is_in_invoice' => true,
                'invoice_id' => NULL,
            ])->get();
        }
        $total_arr = [
            'total_cost' => 0,
            'total_vat' => 0,
            'total_price_withe_vat' => 0,
            'total_price_withe_vat_text' => '',
            'vat_percentage' => 0,
            'contracts_id' => [],
            'project_services_id' => [],
        ];
        foreach ($project_contracts as $contract) {
            $total_arr['total_cost'] += $contract->cost;
            $total_arr['total_vat'] += $contract->vat_value;
            $total_arr['total_price_withe_vat'] += $contract->price_withe_vat;
            $total_arr['vat_percentage'] = (float) $contract->vat_percentage;
            array_push($total_arr['contracts_id'], $contract->id);
        }
        foreach ($project_services as $service) {
            $total_arr['total_cost'] += $service->price;
            $total_arr['total_vat'] += $service->vat_value;
            $total_arr['total_price_withe_vat'] += $service->price_withe_vat;
            $total_arr['vat_percentage'] = (float) $service->vat_percentage;
            array_push($total_arr['project_services_id'], $service->id);
        }
        $ar_num  = new \App\I18N_Arabic_Numbers();
        $total_arr['total_price_withe_vat_text'] = $ar_num->money2str($total_arr['total_price_withe_vat'], 'SAR');

        return $total_arr;
    }
    // -----------------------------------------------------------------------------------------------------------------
    private function create_invoice_items(array $contracts_id_arr, array $project_services_id_arr, $invoice_id)
    {
        // --------------------- ****** --------------------- ****** ---------------------
        foreach ($contracts_id_arr as $contract_id) {
            $contract = Contract::findOrFail($contract_id);
            $new_invoice_item = new InvoiceItem;
            $new_invoice_item->invoice_id  = $invoice_id;
            $new_invoice_item->item_model = 'App\Contract';
            $new_invoice_item->item_model_id = $contract_id;
            $new_invoice_item->item_name_ar = $contract->contract_type()->first()->name_ar;
            if ($contract->name_en) {
                $new_invoice_item->item_name_en = $contract->contract_type()->first()->name_en;
            }
            $new_invoice_item->item_quantity = 1;
            $new_invoice_item->item_price = $contract->cost;
            $new_invoice_item->item_vat_percentage = $contract->vat_percentage;
            $new_invoice_item->item_vat_value = $contract->vat_value;
            $new_invoice_item->item_price_withe_vat = $contract->price_withe_vat;
            $new_invoice_item->created_by_id = auth()->user()->id;
            $new_invoice_item->save();

            // assign invoce id to contract            
            // ------------------    -------- -----
            $contract->invoice_id = $invoice_id;
            $contract->save();
        }
        // --------------------- ****** --------------------- ****** ---------------------
        foreach ($project_services_id_arr as $service_id) {
            $project_service = ProjectService::findOrFail($service_id);
            $new_invoice_item = new InvoiceItem;
            $new_invoice_item->invoice_id  = $invoice_id;
            $new_invoice_item->item_model = 'App\ProjectService';
            $new_invoice_item->item_model_id = $service_id;
            $new_invoice_item->item_name_ar = $project_service->name_ar;
            if ($project_service->name_en) {
                $new_invoice_item->item_name_en = $project_service->name_en;
            }
            $new_invoice_item->item_quantity = 1;
            $new_invoice_item->item_price = $project_service->price;
            $new_invoice_item->item_vat_percentage = $project_service->vat_percentage;
            $new_invoice_item->item_vat_value = $project_service->vat_value;
            $new_invoice_item->item_price_withe_vat = $project_service->price_withe_vat;
            $new_invoice_item->created_by_id = auth()->user()->id;
            $new_invoice_item->save();

            // assign invoce id to project_service            
            // ------------------    -------- -----
            $project_service->invoice_id = $invoice_id;
            $project_service->save();
        }
        // --------------------- ****** --------------------- ****** ---------------------
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function re_calc_invoice($invoice)
    {
        $project = Project::find($invoice->project_id);
        // ------------------------------------------------------------
        $total_arr = (new InvoiceController)->get_total_array($project, $invoice);
        if (count($total_arr['contracts_id']) < 1 && count($total_arr['project_services_id']) < 1) {
            return redirect()->back()->withErrors([
                'No Contracts Or Services available to add in invoice', 'لايوجد عقود أو خدمات متاحة للفوترة'
            ]);
        }
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $invoice->total_cost = $total_arr['total_cost'];
        $invoice->vat_percentage = $total_arr['vat_percentage'];
        $invoice->total_vat_value = $total_arr['total_vat'];
        $invoice->total_price_withe_vat = $total_arr['total_price_withe_vat'];
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $invoice->last_edit_by_id = auth()->user()->id;
        return $invoice;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_pdf(Request $request)
    {
        // data needed in document
        $project = Project::findOrFail($request->project_id);
        $invoice = Invoice::findOrFail($request->invoice_id);
        $invoice_items = InvoiceItem::where('invoice_id', $invoice->id)->get();
        $office_data = OfficeData::findOrFail(1);
        $date_and_time = DateAndTime::get_date_time_arr($invoice->g_date);
        $invoice_total_arr = $this->invoice_total_arr($invoice);
        $data = [
            'project' => $project,
            'invoice' => $invoice,
            'invoice_items' => $invoice_items,
            'office_data' => $office_data,
            'date_and_time' => $date_and_time,
            'invoice_total_arr' => $invoice_total_arr,
            '_' => (new ProjectDocController)->get_doc_data($project),
        ];
        // creating pdf 
        $newPDF = new TCPDF();
        // Content
        $doc_name = 'tafweed';
        $pdf_view = 'projectDoc.invoice';
        $is_tafweed = true;
        // -----------------------------------------------------------------
        $newPDF = ProjectDocController::set_invoice_header_footer($newPDF, $is_tafweed);
        $newPDF = ProjectDocController::set_common_settings($newPDF);
        // -----------------------------------------------------------------
        $newPDF::SetFont('al-mohanad', '', 10, '', false);
        // -----------------------------------------------------------------
        $newPDF::SetTitle('فاتورة');
        $newPDF::SetSubject('فاتورة');
        // -----------------------------------------------------------------
        $the_view = View::make($pdf_view)->with($data);
        $html = $the_view->render();
        $newPDF::AddPage('P', 'A4');
        $newPDF::writeHTML($html, true, false, true, false, '');
        // ----------------------------------------------------------------- ========>
        // to print contract no and user id and contract creator id 
        $text = 'Code="In' . $invoice->invoice_no
            . '-Up' . auth()->user()->id
            . '-P' . $invoice->project_id
            . '-Uc' . $invoice->created_by_id
            . '"';
        // ----------------------------------------------------------------- 
        $newPDF::SetY(150);
        $newPDF::SetX(198);
        $newPDF::StartTransform();
        $newPDF::Rotate(+90);
        $newPDF::SetFont('consolas', '', 8);
        $newPDF::SetTextColor(0, 0, 0, 35);;
        $newPDF::Cell(0, 0, $text, 0, 0, 'C', 0, '', 0, false, 'B', 'B');
        $newPDF::StopTransform();
        // ----------------------------------------------------------------- ========>
        if (auth()->user()->is_admin) {

            $qr_text = 'Invoice Number is' . $invoice->invoice_no_prefix . '-' . $invoice->invoice_no
                . '|Date is' . $invoice->g_date
                . '|From' . 'مكتب عبدالرزاق حكيم للإستشارات الهندسية'
                . '|VAT Number is' . '300537782200003'
                . '|TO' . $invoice->beneficiary_name_ar
                . '|Total cost=' . $invoice->total_cost
                . '|Total VAT Value=' . $invoice->total_vat_value
                . '|Total Price Withe VAT=' . $invoice->total_price_withe_vat;

            $svgString = \QrCode::format('svg')->encoding('UTF-8')->generate($qr_text);
            $newPDF::ImageSVG('@' . $svgString, $x = 35, $y = 248, $w = '20', $h = '', $link = 'http://www.tcpdf.org', $align = '', $palign = '', $border = 0, $fitonpage = false);
        }
        // ----------------------------------------------------------------- ========>
        $newPDF::lastPage();
        if (env('DEVELOPMENT'))  return  $newPDF::Output(date_format(now(), 'Ymd_His') . '.pdf', 'I');
        $newPDF::Output(date_format(now(), 'Ymd_His') . '.pdf', 'D');
        return;
    }
    // -----------------------------------------------------------------------------------------------------------------
    private function invoice_total_arr($invoice)
    {
        // I18N_Arabic_Numbers
        $ar_num  = new \App\I18N_Arabic_Numbers();

        return [
            'total_cost_no' => (float)$invoice->total_cost,
            'total_cost_text' => $ar_num->money2str($invoice->total_cost, 'SAR'),
            'vat_percentage' => (float)$invoice->vat_percentage,
            'total_vat_value_no' => (float)$invoice->total_vat_value,
            'total_vat_value_text' => $ar_num->money2str($invoice->total_vat_value, 'SAR'),
            'total_price_withe_vat_no' => (float)$invoice->total_price_withe_vat,
            'total_price_withe_vat_text' => $ar_num->money2str($invoice->total_price_withe_vat, 'SAR'),

        ];
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function set_beneficiary_info($invoice, $project = null, $invoice_beneficiary = null)
    {
        if (!$invoice_beneficiary) $invoice_beneficiary = $invoice->beneficiary_row_value;
        if (!$project) $project = Project::find($invoice->project_id);
        $invoice->beneficiary_row_value = $invoice_beneficiary;
        if ($invoice_beneficiary == 'project_name_ar') {
            $invoice->beneficiary_id = NULL;
            $invoice->beneficiary_type = NULL;
            $invoice->beneficiary_relation_to_project = NULL;
            $invoice->beneficiary_name_ar = $project->project_name_ar;
            $invoice->beneficiary_name_en = $project->project_name_en;
            $invoice->beneficiary_address_ar = $project->get_invoice_addrees_ar();
            $invoice->beneficiary_address_en = $project->get_invoice_addrees_en();
            $invoice->beneficiary_vat_no = $project->invoicing_vat_no;
        }
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        $beneficiary_arr = ['|'];
        $beneficiary_arr = explode('|', $invoice_beneficiary);
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        if ($beneficiary_arr[0] == 'owner') {
            if ($beneficiary_arr[1] == 'person') {
                $invoice->beneficiary_id = $beneficiary_arr[2];
                $invoice->beneficiary_type = 'person';
                $invoice->beneficiary_relation_to_project = 'owner';
                $invoice->beneficiary_name_ar = $project->person()->first()->get_full_name_ar();
                $invoice->beneficiary_name_en = $project->person()->first()->get_full_name_en();
                $invoice->beneficiary_address_ar = $project->get_invoice_addrees_ar();
                $invoice->beneficiary_address_en = $project->get_invoice_addrees_en();
                $invoice->beneficiary_vat_no = $project->invoicing_vat_no;
            }
            if ($beneficiary_arr[1] == 'organization') {
                $invoice->beneficiary_id = $beneficiary_arr[2];
                $invoice->beneficiary_type = 'organization';
                $invoice->beneficiary_relation_to_project = 'owner';
                $organization = Organization::find($beneficiary_arr[2]);
                $invoice->beneficiary_name_ar = $organization->name_ar;
                $invoice->beneficiary_name_en = $organization->name_en;
                if ($organization->invoice_address_ar) {
                    $invoice->beneficiary_address_ar = $organization->invoice_address_ar;
                } elseif ($project->invoicing_address_ar) {
                    $invoice->beneficiary_address_ar = $project->invoicing_address_ar;
                } else {
                    $invoice->beneficiary_address_ar = $project->get_invoice_addrees_ar();
                }
                if ($organization->invoice_address_en) {
                    $invoice->beneficiary_address_en = $organization->invoice_address_en;
                } elseif ($project->invoicing_address_en) {
                    $invoice->beneficiary_address_en = $project->invoicing_address_en;
                } else {
                    $invoice->beneficiary_address_en = $project->get_invoice_addrees_en();
                }
                $invoice->beneficiary_vat_no = ($organization->VAT_account_no)
                    ? $organization->VAT_account_no
                    : $project->invoicing_vat_no;
            }
        }
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        if ($beneficiary_arr[0] == 'representative') {
            $invoice->beneficiary_id = $beneficiary_arr[2];
            $invoice->beneficiary_type = 'person';
            $person = Person::find($beneficiary_arr[2]);
            $invoice->beneficiary_relation_to_project = 'representative';
            $invoice->beneficiary_name_ar = $person->get_full_name_ar();
            $invoice->beneficiary_name_en = $person->get_full_name_en();
            $invoice->beneficiary_address_ar = $project->invoicing_address_ar;
            $invoice->beneficiary_address_en = $project->invoicing_address_en;
            $invoice->beneficiary_vat_no = $project->invoicing_vat_no;
        }
        // ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----   ----
        if ($beneficiary_arr[0] == 'beneficiary') {
            if ($beneficiary_arr[1] == 'person') {
                $invoice->beneficiary_id = $beneficiary_arr[2];
                $invoice->beneficiary_type = 'person';
                $person = Person::find($beneficiary_arr[2]);
                $project_beneficiary = ProjectBeneficiary::where('project_id', $project->id)->where('person_id', $beneficiary_arr[2])->first();
                $invoice->beneficiary_relation_to_project = ($project_beneficiary->relation_to_project)
                    ? $project_beneficiary->relation_to_project : 'beneficiary';
                $invoice->beneficiary_name_ar = $person->get_full_name_ar();
                $invoice->beneficiary_name_en = $person->get_full_name_en();
                $invoice->beneficiary_address_ar = $project->get_invoice_addrees_ar();
                $invoice->beneficiary_address_en = $project->get_invoice_addrees_en();
                $invoice->beneficiary_vat_no = $project->invoicing_vat_no;
            }
            if ($beneficiary_arr[1] == 'organization') {
                $invoice->beneficiary_id = $beneficiary_arr[2];
                $invoice->beneficiary_type = 'organization';
                $organization = Organization::find($beneficiary_arr[2]);
                $project_beneficiary = ProjectBeneficiary::where('project_id', $project->id)->where('organization_id', $beneficiary_arr[2])->first();
                $invoice->beneficiary_relation_to_project = ($project_beneficiary->relation_to_project)
                    ? $project_beneficiary->relation_to_project : 'beneficiary';
                $invoice->beneficiary_name_ar = $organization->name_ar;
                $invoice->beneficiary_name_en = $organization->name_en;
                if ($organization->invoice_address_ar) {
                    $invoice->beneficiary_address_ar = $organization->invoice_address_ar;
                } elseif ($project->invoicing_address_ar) {
                    $invoice->beneficiary_address_ar = $project->invoicing_address_ar;
                } else {
                    $invoice->beneficiary_address_ar = $project->get_invoice_addrees_ar();
                }
                if ($organization->invoice_address_en) {
                    $invoice->beneficiary_address_en = $organization->invoice_address_en;
                } elseif ($project->invoicing_address_en) {
                    $invoice->beneficiary_address_en = $project->invoicing_address_en;
                } else {
                    $invoice->beneficiary_address_en = $project->get_invoice_addrees_en();
                }
                $invoice->beneficiary_vat_no = ($organization->VAT_account_no)
                    ? $organization->VAT_account_no
                    : $project->invoicing_vat_no;
            }
        }
        return $invoice;
    }
    // -----------------------------------------------------------------------------------------------------------------
}
