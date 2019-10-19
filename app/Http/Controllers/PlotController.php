<?php

namespace App\Http\Controllers;

use App\plot;
use Illuminate\Http\Request;

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
        // return view('person.index')->with('persons', $allPersons);
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
        $districts = $this->getDistricts();
        $municipality_branchs = $this->get_municipality_branches();
        $plot = new Plot;

        return view('plot.create')->with([
            'districts' => $districts,
            'municipality_branchs' => $municipality_branchs,
            'new_deed_no' => $new_deed_no,
            'plot' => $plot

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

        $aad_user_id = auth()->user()->id;
        $add_user_name = auth()->user()->user_name;

        $addby = [
            'aad_user_id' =>  $aad_user_id,
            'add_user_name' => $add_user_name
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

        $districts = $this->getDistricts();
        $municipality_branchs = $this->get_municipality_branches();

        return view('plot.edit')->with(
            [
                'districts' => $districts,
                'municipality_branchs' => $municipality_branchs,
                'plot' => $plot
            ]
        );
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

    public function validatePlot($request)
    {
        return $request->validate([
            'deed_no' => 'required',
            'deed_date' => 'required',
            'plot_no' => 'required| numeric',
            'plan_name' => 'required|string|regex:/\p{Arabic}/u',
            'plan_no' => 'required|string',
            'area' => 'required| numeric',
            'district' => 'required|string',
            'road_code' => 'required|numeric',
            'road_name' => 'required|string|regex:/\p{Arabic}/u',
            'municipality_branch' => 'required|string'
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



    protected const Municipality_Branchs = [
        'أمانة المدينة المنورة',
        'بلدية قباء',
        'بلدية أحد',
        'بلدية العوالي',
        'بلدية العقيق',
        'بلدية العيون',
        'بلدية البيداء',
        'بلدية الحرم',
        'بلدية الصويدرة',
        'بلدية العاقول',
        'بلدية المليليح',
        'بلدية المندسة',
        'بلدية أبيار الماشي',
        'بلدية الفريش',
        'البدلية النسائية',
        'الحسو',
        'الحناكية',
        'السويرقية',
        'الصلصلة',
        'العشاش',
        'العلا',
        'العيص',
        'المسيجيد والقاحة',
        'المهد',
        'النخيل',
        'بدر',
        'ثرب',
        'خيبر',
        'سليلة جهينة والمربع',
        'وادي الفرع',
        'ينبع',
        'ينبع النخل'
    ];

    public static function get_municipality_branches()
    {
        return self::Municipality_Branchs;
    }
}
