<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Invoice;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        // dd($this->authorize('view-any', Invoice::class));
        return view('invoice.index');
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
        // ----   ----   ----   ----
        $this->authorize('view-any', Invoice::class);
        // ----   ----   ----   ----
        $project = Project::findOrFail($request->project_id);
        $date_and_time = DateAndTime::get_date_time_arr();
        // ----   ----   ----   ----
        $invoice = new Invoice;
        // ----   ----   ----   ----
        $invoice->invoice_no = $this->get_new_invoice_no();
        $invoice->invoice_no_prefix = $date_and_time['g_year_no'];
        $invoice->project_id = $project->id;
        $invoice->person_id = $project->person->id;
        $invoice->issued_by_id = auth()->user()->id;
        $invoice->h_date = $date_and_time['h_date_ar'];
        $invoice->g_date = $date_and_time['g_date_ar'];
        // ----   ----   ----   ----
        $total_arr = $this->get_total_array($project);
        if (count($total_arr['contracts_id']) < 1) {
            return redirect()->back()->withErrors(['No Contracts Or Services available to add in invoice', 'لايوجد عقود أو خدمات متاحة للفوترة']);
        }

        $invoice->total_cost = $total_arr['total_cost'];
        $invoice->vat_percentage = $total_arr['vat_percentage'];
        $invoice->total_vat_value = $total_arr['total_vat'];
        $invoice->total_price_withe_vat = $total_arr['total_price_withe_vat'];
        // ----   ----   ----   ----
        $invoice->created_by_id = auth()->user()->id;
        $invoice->save();
        // ----   ----   ----   ----
        $this->set_invoce_id_to_contract($total_arr['contracts_id'], $invoice->id);
        return InvoiceItemController::create_invoice_items($invoice, $project);
        return $invoice;
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
        //
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
    private function get_total_array($project)
    {
        $project_contracts = ContractController::get_project_contracts_for_invoice($project);
        $total_arr = [
            'total_cost' => 0,
            'total_vat' => 0,
            'total_price_withe_vat' => 0,
            'total_price_withe_vat_text' => '',
            'vat_percentage' => 0,
            'contracts_id' => [],
        ];
        foreach ($project_contracts as $contract) {
            $total_arr['total_cost'] += $contract->cost;
            $total_arr['total_vat'] += $contract->vat_value;
            $total_arr['total_price_withe_vat'] += $contract->price_withe_vat;
            $total_arr['vat_percentage'] = (int) $contract->vat_percentage;
            array_push($total_arr['contracts_id'], $contract->id);
        }
        $ar_num  = new \App\I18N_Arabic_Numbers();
        $total_arr['total_price_withe_vat_text'] = $ar_num->money2str($total_arr['total_price_withe_vat'], 'SAR');

        return $total_arr;
    }
    // -----------------------------------------------------------------------------------------------------------------
    private function set_invoce_id_to_contract(array $contracts_id_arr, $invoice_id)
    {
        foreach ($contracts_id_arr as $contract_id) {
            $contract = Contract::findOrFail($contract_id);
            $contract->invoice_id = $invoice_id;
            $contract->save();
        }
    }
    // -----------------------------------------------------------------------------------------------------------------
}
