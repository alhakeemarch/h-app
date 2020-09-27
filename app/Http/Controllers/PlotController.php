<?php

namespace App\Http\Controllers;

use App\AllowedBuildingHeight;
use App\AllowedBuildingRatio;
use App\AllowedUsage;
use App\District;
use App\plot;
use App\Rules\ValidDistrict;
use App\Rules\ValidMunicipalityBranch;
use App\Rules\ValidPlan;
use App\Rules\ValidDate;
use App\Rules\ValidHijriDate;
use Illuminate\Http\Request;
use App\MunicipalityBranch;
use App\Neighbor;
use App\Plan;
use App\Project;
use App\street;

class PlotController extends Controller
{
    // ---------------------------------------------------------------------------------------------
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // ---------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plot $plot)
    {
        $plots = $plot->all()->reverse();
        return view('plot.index')->with('plots', $plots);
        //
    }
    // ---------------------------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Plot $plot)
    {
        if (!$request->deed_no) {
            return redirect()->action('PlotController@check');
        }

        $formsData = array_merge($this->formsData(), [
            'new_deed_no' => $request->deed_no,
            'plot' => new Plot,
            'project' => new Project,
        ]);

        return view('plot.create')->with($formsData);
    }
    // ---------------------------------------------------------------------------------------------
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validatedData = $this->validatePlot($request);

        $addby = [
            'created_by_id' =>  auth()->user()->id,
            'created_by_name' => auth()->user()->user_name,
        ];

        $validatedData = array_merge($validatedData, $addby);
        $plot = Plot::create($validatedData);
        return redirect()->action('PlotController@show', [$plot]);
    }
    // ---------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show(plot $plot)
    {
        return view('plot.show')->with('plot', $plot);
    }
    // ---------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(plot $plot)
    {
        $project = new Project();
        if ($project->where('id', $plot->project_id)->first()) {
            $project = $project->where('id', $plot->project_id)->first();
        }

        $formsData = array_merge($this->formsData(), [
            'new_deed_no' => false,
            'plot' => $plot,
            'project' =>  $project,
        ]);

        return view('plot.edit')->with($formsData);
    }
    // ---------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plot $plot)
    {
        // return $request;
        $validatedData = $this->validatePlot($request);
        $last_edit_by_id = auth()->user()->id;
        $last_edit_by_name  = auth()->user()->user_name;


        $editedby = [
            'last_edit_by_id' =>  $last_edit_by_id,
            'last_edit_by_name' => $last_edit_by_name,
        ];
        $validatedData = array_merge($validatedData, $editedby);

        // this returns true if don
        Plot::where('id', $plot->id)->update($validatedData);

        return redirect()->action('PlotController@show', [$plot]);
    }
    // ---------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function destroy(plot $plot)
    {
        return 'destroy function in plot controler';
    }


    // ---------------------------------------------------------------------------------------------
    public function check(Request $request, plot $plot)
    {
        if ($request->method() === "GET") {
            return view('/plot/check');
        }
        // return $request;
        $validatedData = $request->validate([
            'deed_no' => 'required',
        ]);

        $found_deed = $plot->where('deed_no', $request->deed_no)->first();
        if ($found_deed) {
            return redirect()->action('PlotController@show', [$found_deed]);
        } else {
            return redirect()->action('PlotController@create', $request);
        }
    }
    // ---------------------------------------------------------------------------------------------
    public static function formsData()
    {
        $districts = District::all();
        $neighbors = Neighbor::all();
        $municipality_branchs = MunicipalityBranch::all();
        $building_ratios = AllowedBuildingRatio::all();
        $building_heights = AllowedBuildingHeight::all();
        $usages = AllowedUsage::all();
        $plans = Plan::all();
        $streets = Street::all('id', 'ar_name')->sortBy('ar_name');
        return [
            'districts' => $districts,
            'neighbors' => $neighbors,
            'municipality_branchs' => $municipality_branchs,
            'building_ratios' => $building_ratios,
            'building_heights' => $building_heights,
            'usages' => $usages,
            'plans' => $plans,
            'plans' => $plans,
            'streets' => $streets,
        ];
    }
    // ---------------------------------------------------------------------------------------------
    /**
     * validate the specified resource inputs.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public static function validatePlot($request)
    {

        return $request->validate([
            'project_id' => 'nullable|numeric',
            'deed_no' => 'required',
            // 'deed_date' => ['required', new ValidDate],
            'deed_date' => ['required', new ValidHijriDate],
            'plot_no' => ['required', 'string'],
            'area' => 'nullable| numeric',
            'allowed_building_ratio_id' => ['nullable', 'numeric'],
            'allowed_building_height_id' => ['nullable', 'numeric'],
            'allowed_usage_id' => ['nullable', 'numeric'],
            'plan_id' => [
                'nullable', 'numeric', //new ValidPlan
            ],
            'district_id' => [
                'nullable', 'numeric', //new ValidDistrict
            ],
            'neighbor_id' => [
                'nullable', 'numeric', //new neighbor
            ],
            'municipality_branch_id' => [
                'nullable', 'numeric', //new ValidMunicipalityBranch
            ],
            'street_id' => [
                'nullable', 'numeric', //new ValidStreet
            ],
            'x_coordinate' => [
                'nullable', 'numeric', //new Valid_X_Coordinate
            ],
            'y_coordinate' => [
                'nullable', 'numeric', //new Valid_Y_Coordinate
            ],

            'north_border_name' => 'nullable|string| regex:/\p{Arabic}/u',
            'north_border_length' => 'nullable|numeric',
            'north_border_setback' => 'nullable|numeric',
            'north_border_cantilever' => 'nullable|numeric',
            'north_border_chamfer' => 'nullable|numeric',
            'north_border_note' => 'nullable',

            'south_border_name' => 'nullable|string| regex:/\p{Arabic}/u',
            'south_border_length' => 'nullable|numeric',
            'south_border_setback' => 'nullable|numeric',
            'south_border_cantilever' => 'nullable|numeric',
            'south_border_chamfer' => 'nullable|numeric',
            'south_border_note' => 'nullable',

            'east_border_name' => 'nullable|string| regex:/\p{Arabic}/u',
            'east_border_length' => 'nullable|numeric',
            'east_border_setback' => 'nullable|numeric',
            'east_border_cantilever' => 'nullable|numeric',
            'east_border_chamfer' => 'nullable|numeric',
            'east_border_note' => 'nullable',

            'west_border_name' => 'nullable|string| regex:/\p{Arabic}/u',
            'west_border_length' => 'nullable|numeric',
            'west_border_setback' => 'nullable|numeric',
            'west_border_cantilever' => 'nullable|numeric',
            'west_border_chamfer' => 'nullable|numeric',
            'west_border_note' => 'nullable',

            'notes' => 'string|nullable',
            'private_notes' => 'string|nullable',
        ]);
    }
    // ---------------------------------------------------------------------------------------------
}
