<?php

namespace App\Http\Controllers;

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
    public function edit(ProjectService $projectService)
    {
        //
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
        return $request;
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
        //
    }
}
