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
use Illuminate\Http\Request;
use App\MunicipalityBranch;
use App\Plan;
use App\Project;
use App\street;

class PlotController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plot $plot)
    {
        $plots = $plot->all();
        return view('plot.index')->with('plots', $plots);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->deed_no) {
            return redirect()->action('PlotController@check');
        }
        $new_deed_no = $request->deed_no;
        $districts = District::all();
        $municipality_branchs = MunicipalityBranch::all();
        $plot = new Plot;
        $project = new Project();
        $building_ratios = AllowedBuildingRatio::all();
        $building_heights = AllowedBuildingHeight::all();
        $usages = AllowedUsage::all();
        $plans = Plan::all();
        $streets = Street::all('id', 'ar_name')->sortBy('ar_name');
        // $project->project_no = 75;

        return view('plot.create')->with([
            'districts' => $districts,
            'municipality_branchs' => $municipality_branchs,
            'new_deed_no' => $new_deed_no,
            'plot' => $plot,
            'project' => $project,
            'building_ratios' => $building_ratios,
            'building_heights' => $building_heights,
            'usages' => $usages,
            'plans' => $plans,
            'streets' => $streets,
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
        // return $request->all();
        $validatedData = $this->validatePlot($request);
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->user_name;

        $addby = [
            'created_by_id' =>  $created_by_id,
            'created_by_name' => $created_by_name
        ];

        $validatedData = array_merge($validatedData, $addby);
        $plot = Plot::create($validatedData);
        return redirect()->action('PlotController@show', [$plot]);
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(plot $plot)
    {


        $new_deed_no = false;
        $districts = District::all();
        $municipality_branchs = MunicipalityBranch::all();
        $project = new Project();
        if ($project->where('id', $plot->project_id)->first()) {
            $project = $project->where('id', $plot->project_id)->first();
        }
        $building_ratios = AllowedBuildingRatio::all();
        $building_heights = AllowedBuildingHeight::all();
        $usages = AllowedUsage::all();
        $plans = Plan::all();
        $streets = Street::all('id', 'ar_name')->sortBy('ar_name');


        return view('plot.edit')->with([
            'districts' => $districts,
            'municipality_branchs' => $municipality_branchs,
            'new_deed_no' => $new_deed_no,
            'plot' => $plot,
            'project' => $project,
            'building_ratios' => $building_ratios,
            'building_heights' => $building_heights,
            'usages' => $usages,
            'plans' => $plans,
            'streets' => $streets,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plot $plot)
    {

        $validatedData = $this->validatePlot($request);
        $last_edit_user_id = auth()->user()->id;
        $last_edit_user_name  = auth()->user()->user_name;


        $editedby = [
            'last_edit_user_id' =>  $last_edit_user_id,
            'last_edit_user_name' => $last_edit_user_name
        ];
        $validatedData = array_merge($validatedData, $editedby);

        // this returns true if don
        Plot::where('id', $plot->id)->update($validatedData);

        return redirect()->action('PlotController@show', [$plot]);
    }

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

    /**
     * validate the specified resource inputs.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function validatePlot($request)
    {
        return $request->validate([
            'project_id' => 'nullable|numeric',
            'deed_no' => 'required',
            'deed_date' => 'required',
            'plot_no' => ['required', 'numeric',],
            'area' => 'required| numeric',
            'allowed_building_ratio' => ['required', 'numeric'],
            'allowed_building_height' => ['required', 'numeric'],
            'allowed_usage' => ['required', 'numeric'],
            'allowed_usage' => ['required', 'numeric'],
            'plan_id' => [
                'required', 'numeric', //new ValidPlan
            ],
            'district_id' => [
                'required', 'numeric', //new ValidDistrict
            ],
            'municipality_branch_id' => [
                'required', 'numeric', //new ValidMunicipalityBranch
            ],
            'street_id' => [
                'required', 'numeric', //new ValidStreet
            ],
            'x_coordinate' => [
                'required', 'numeric', //new Valid_X_Coordinate
            ],
            'y_coordinate' => [
                'required', 'numeric', //new Valid_Y_Coordinate
            ],

            'north_border_name' => 'required|string| regex:/\p{Arabic}/u',
            'north_border_length' => 'required|numeric',
            'north_border_setback' => 'required|numeric',
            'north_border_cantilever' => 'required|numeric',
            'north_border_chamfer' => 'required|numeric',
            'north_border_note' => 'nullable',

            'south_border_name' => 'required|string| regex:/\p{Arabic}/u',
            'south_border_length' => 'required|numeric',
            'south_border_setback' => 'required|numeric',
            'south_border_cantilever' => 'required|numeric',
            'south_border_chamfer' => 'required|numeric',
            'south_border_note' => 'nullable',

            'east_border_name' => 'required|string| regex:/\p{Arabic}/u',
            'east_border_length' => 'required|numeric',
            'east_border_setback' => 'required|numeric',
            'east_border_cantilever' => 'required|numeric',
            'east_border_chamfer' => 'required|numeric',
            'east_border_note' => 'nullable',

            'west_border_name' => 'required|string| regex:/\p{Arabic}/u',
            'west_border_length' => 'required|numeric',
            'west_border_setback' => 'required|numeric',
            'west_border_cantilever' => 'required|numeric',
            'west_border_chamfer' => 'required|numeric',
            'west_border_note' => 'nullable',

            'notes' => 'string|nullable'
        ]);
    }

    protected $plans = [];
    protected const DISTRICTS = [
        'ابار علي',
        'ابيار الماشي',
        'ارض الكردي',
        'الاصيفرين',
        'الاعمده',
        'الاكحل',
        'الاناهي',
        'الإسكان',
        'الأمير تركي',
        'البركة',
        'البقيع',
        'البيضاء',
        'التشليح',
        'التلعة',
        'الجابرة',
        'الجامعة',
        'الجرنافة',
        'الجصة',
        'الجماوات',
        'الجمعة',
        'الحار',
        'الحديدي',
        'الحديقة',
        'الحرم الشريف',
        'الحساء',
        'الحفية',
        'الحلقة',
        'الحمنة',
        'الحنو',
        'الخاتم',
        'الخالدية',
        'الدار',
        'الدرع',
        'الدفاع',
        'الدويخلة',
        'الدويمة',
        'الرانوناء',
        'الراية',
        'الرذايا',
        'الرصيعة',
        'الرمانة',
        'الروابي',
        'الريان',
        'الريض',
        'الزهرة',
        'السحمان',
        'السد',
        'السدرة',
        'السقيا',
        'السكب',
        'السم',
        'السيح',
        'الشافية',
        'الشامي',
        'الشرائع',
        'الشريبات',
        'الشفية',
        'الشهباء',
        'الشهداء',
        'الشوامين',
        'الصادفية',
        'الصميمة',
        'الصناعية',
        'الصهلوج',
        'الضميرية',
        'الظاهرة',
        'العاطفه',
        'العاقول',
        'العريض',
        'العزيزية',
        'العصبة',
        'العطشان',
        'العنابس',
        'العهن',
        'العوالي',
        'العوينة',
        'العيون',
        'الغابة',
        'الغراء',
        'الفتح',
        'الفقير',
        'الفيفا',
        'القبلتين',
        'القبيبة',
        'القصواء',
        'المبعوث',
        'المحضة',
        'المديرا',
        'المزايين',
        'المضيق',
        'المطار',
        'المغيسلة',
        'المفرحات',
        'المقلب',
        'الملك فهد',
        'المليليح',
        'المناخة',
        'المندسة',
        'المنشار',
        'النبلاء',
        'النبلاء',
        'النخيل',
        'النقا',
        'النقمي',
        'الهدراء',
        'الهضبة',
        'الهمجة',
        'الهندية',
        'الوبرة',
        'اليتمة',
        'اليسرة',
        'ام الدوود',
        'ام السيوف',
        'أبو بريقاء',
        'أبو سدر',
        'أبو ضباع',
        'أبو مرخة',
        'أبوكبير',
        'أم العيال',
        'أم خالد',
        'بضاعة',
        'بني النجار',
        'بني بياضة',
        'بني حارثة',
        'بني خدرة',
        'بني خدرة',
        'بني ظفر',
        'بني عبدالاشهل',
        'بني معاوية',
        'بئر عثمان',
        'جبل أحد',
        'جبل عير',
        'جشم',
        'حارة النصر',
        'حضوضاء',
        'خاخ',
        'خلص',
        'ذو الحليفة',
        'رهط',
        'سد الغابة',
        'سلطانة',
        'شظاة',
        'شعيب الخضره',
        'شوران',
        'صوري',
        'طيبة',
        'عروة',
        'عين الخيف',
        'غراب',
        'فرشة',
        'قربان',
        'قريضة',
        'كنانة',
        'مثلث الاكحل',
        'مذينب',
        'ملح',
        'مهزوز',
        'وادي البيطان',
        'وادي ظمة',
        'ورقان',
        'وعيزة',
        'ولد محمد',
    ];
    public static function  getDistricts()
    {
        // have 162 records
        // from index 0 to 161
        return self::DISTRICTS;
    }
}
