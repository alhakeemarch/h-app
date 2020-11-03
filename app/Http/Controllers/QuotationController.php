<?php

namespace App\Http\Controllers;

use App\PersonTitles;
use App\Project;
use App\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
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
    public function create(Request $request, Project $project, Quotation $quotation)
    {
        $project = Project::findOrFail($request->project_id);
        $person_titles = PersonTitles::all();
        return view('quotation.create')->with([
            'project' => $project,
            'person_titles' => $person_titles,
            'quotation' => $quotation,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Quotation $quotation)
    {
        $project = Project::findOrFail($request->project_id);
        $person_titles = PersonTitles::all();
        return view('quotation.edit')->with([
            'project' => $project,
            'quotation' => $quotation,
            'person_titles' => $person_titles,
        ]);
        return $request;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        if ($request->update_address_to) {
            $request->validate([
                'address_to_title_id' => 'required|numeric',
                'address_to_name' => 'string|required',
                'is_address_to_before_owner' => 'boolean|required',
            ]);
            $quotation->address_to_title_id = $request->address_to_title_id;
            $quotation->address_to_name = $request->address_to_name;
            $quotation->is_address_to_before_owner = $request->is_address_to_before_owner;
            $quotation->last_edit_by_id = auth()->user()->id;
            $quotation->last_edit_by_name = auth()->user()->user_name;
            $quotation->save();
            return redirect(route('project.show', $request->project_id))
                ->with('success', 'quotation updated successfully - تم تحديث العرض بنجاح');
        }
        if ($request->update_quotation_date) {
            $date_and_time = DateAndTime::get_date_time_arr();
            $quotation->quotation_date = $date_and_time['g_date_en'];
            $quotation->last_edit_by_id = auth()->user()->id;
            $quotation->last_edit_by_name = auth()->user()->user_name;
            $quotation->save();
            return redirect(route('project.show', $request->project_id))
                ->with('success', 'quotation updated successfully - تم تحديث العرض بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        //
    }
    public static function create_new($data)
    {
        $quotation = new Quotation;
        $quotation->project_id = $data['project']->id;
        $quotation->quotation_date = $data['date_and_time']['g_date_en'];
        $quotation->created_by_id = auth()->user()->id;
        $quotation->created_by_name = auth()->user()->user_name;
        $quotation->save();
        // return $quotation;
    }
}
