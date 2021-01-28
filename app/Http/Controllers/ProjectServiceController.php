<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceItem;
use App\ProjectService;
use Illuminate\Http\Request;

class ProjectServiceController extends Controller
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
        if ($request->name_ar == "خدمات إستشارات هندسية ...") {
            return redirect()->back()->withErrors(['name_ar' => 'يرجى كتابة خدمة صالحة']);
        }
        $valed_data = $request->validate([
            'project_id' => 'required|numeric',
            'name_ar' => 'string|required',
            'price' => 'required|numeric',
        ]);

        $valed_data['created_by_id'] = auth()->user()->id;
        $valed_data['date'] = date_format(now(), 'Y-m-d');
        $valed_data['price'] = (float)$valed_data['price'];
        $valed_data['vat_percentage'] = 15;
        $valed_data['vat_value'] = $valed_data['price'] * $valed_data['vat_percentage'] / 100;
        $valed_data['price_withe_vat'] = $valed_data['price'] + $valed_data['vat_value'];
        $project_serveice = new ProjectService;
        $project_serveice->create($valed_data);
        return redirect()->back()->with('success', 'Project Service Added  - تم إضافة الخدمة للمشروع بنجاح');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectService  $projectService
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectService $projectService)
    {
        //
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectService  $projectService
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProjectService $projectService)
    {
        // return $request;
        return view('projectService.edit')->with(['projectService' => $projectService]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectService  $projectService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectService $projectService)
    {

        if ($request->form_action == 'remove_item_form_invoice') {
            $invoice = Invoice::find($projectService->invoice_id);
            $invoice_items = InvoiceItem::where('invoice_id', $projectService->invoice_id)->get();
            if (count($invoice_items) <= 1) {
                return redirect()->back()->withErrors([
                    'connot remove item , invoice cannot be witheout items!',
                    'لا يمكن إزالة الخدمة ، الفاتورة يجب أن يكون بها على الأقل خدمة واحدة!'
                ]);
            }
            $invoice_item = InvoiceItem::where('invoice_id', $projectService->invoice_id)
                ->where('item_model', 'App\ProjectService')->where('item_model_id', $projectService->id)->first();
            $invoice_item->notes .= '|deleted by user by ID=>' . auth()->user()->id;
            $invoice_item->save();
            $invoice_item->delete();
            $projectService->invoice_id = null;
            $projectService->is_in_invoice = null;
            $projectService->last_edit_by_id = auth()->user()->id;
            $projectService->save();
            $invoice = InvoiceController::re_calc_invoice($invoice);
            $invoice->save();
            return redirect()->back()->withSuccess(['serveice removed from Invoice', 'تم إزالة الخدمة من الفاتورة']);
        }
        if ($request->add_or_remove_form_quotation) {
            $projectService->is_in_quotation = !$projectService->is_in_quotation;
            $projectService->save();
            return redirect()->back();
        }
        if ($request->add_or_remove_form_invoice) {
            $projectService->is_in_invoice = !$projectService->is_in_invoice;
            $projectService->save();
            return redirect()->back();
        }
        if ($request->form_action == 'change_project_service_values') {
            $valed_data = $request->validate([
                'name_ar' => 'string|required',
                'name_en' => 'nullable|string',
                'description' => 'nullable|string',
                'price' => 'required|numeric',
                'vat_percentage' => 'required|numeric',
            ]);

            $valed_data['last_edit_by_id'] = auth()->user()->id;
            $valed_data['price'] = (float)$valed_data['price'];
            $valed_data['vat_percentage'] = (float)$valed_data['vat_percentage'];
            $valed_data['vat_value'] = $valed_data['price'] * $valed_data['vat_percentage'] / 100;
            $valed_data['price_withe_vat'] = $valed_data['price'] + $valed_data['vat_value'];
            $projectService->update($valed_data);

            if ($projectService->invoice_id) {
                $invoice = Invoice::find($projectService->invoice_id);
                $invoice_item = InvoiceItem::where('invoice_id', $projectService->invoice_id)
                    ->where('item_model', 'App\ProjectService')->where('item_model_id', $projectService->id)->first();
                $invoice_item->item_name_ar = $valed_data['name_ar'];
                $invoice_item->item_name_en = $valed_data['name_en'];
                $invoice_item->description = $valed_data['description'];
                $invoice_item->item_price = $valed_data['price'];
                $invoice_item->item_vat_percentage = $valed_data['vat_percentage'];
                $invoice_item->item_vat_value = $valed_data['vat_value'];
                $invoice_item->item_price_withe_vat = $valed_data['price_withe_vat'];
                $invoice_item->notes .= '|Edited by user by ID=>' . auth()->user()->id;
                $invoice_item->save();
                $invoice = InvoiceController::re_calc_invoice($invoice);
                $invoice->save();
                return redirect()->route('invoice.edit', $invoice)->withSuccess(['Service Edited Successfully', 'تم تعديل الخدمة بنجاح']);
            }
            return redirect()->back()->withSuccess(['Service Edited Successfully', 'تم تعديل الخدمة بنجاح']);
        }

        return redirect()->back()->withErrors('unknown action');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectService  $projectService
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectService $projectService)
    {
        $projectService->delete();
        $db_record_data = [
            'table' => 'projectServices',
            'model' => 'ProjectService',
            'model_id' => $projectService->id,
            'action' => 'soft_delete',
            'description' => 'projectService withe id = ' . $projectService->id . ' deleted',
        ];
        DbLogController::add_record($db_record_data);
        return redirect()->back()->with('success', 'projectService deleted successfully - تم حذف الخدمة بنجاح');
    }
    // -----------------------------------------------------------------------------------------------------------------
}
