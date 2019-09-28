<?php

namespace App\Http\Controllers;

use App\plot;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plot.index');
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
        $municipality_branchs = [
            'Qbaa',
            'ALAwali',
            'AlHaram',
            'AlOyun',
            'Alaqeeq'
        ];
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
        $validatedData = $request->validate([
            'deed_no' => 'required|',
            'deed_date' => 'required|',
            'plot_no' => 'required| numeric',
            'plan_name' => 'required|string',
            'area' => 'required| numeric',
            'district' => 'required|string',
            'road_code' => 'required|numeric',
            'road_name' => 'required|string'
        ]);



        // $validatedData = $request->validate([

        //     'ar_name1' => 'required|string|min:2',
        //     'ar_name2' => 'string|nullable',
        //     'ar_name3' => 'string|nullable',
        //     'ar_name4' => 'string|nullable',
        //     'ar_name5' => "required|string|min:2",
        //     'en_name1' => 'string|nullable|regex:/[A-Za-z]/',
        //     'en_name2' => 'string|nullable|regex:/[A-Za-z]/',
        //     'en_name3' => 'string|nullable|regex:/[A-Za-z]/',
        //     'en_name4' => 'string|nullable|regex:/[A-Za-z]/',
        //     'en_name5' => 'string|nullable|regex:/[A-Za-z]/',
        //     'mobile' => 'required|numeric|starts_with:0,9|digits:10,12,14',
        //     'nationaltiy_id' => "required",
        //     'hafizah_no' => 'numeric|nullable',
        //     'national_id_issue_date' => 'nullable',
        //     'national_id_expire_date' => 'nullable',
        //     'national_id_issue_place' => 'string|nullable',
        //     'ah_birth_date' => 'nullable',
        //     'ad_birth_date' => 'nullable',
        //     'birth_place' => 'string|nullable',
        //     'national_id' => 'required|numeric|starts_with:1,2|digits:10',
        // ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show(plot $plot)
    {
        return view('plot.shwo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(plot $plot)
    {
        return view('plot.edit');
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
        return 'update function in plot controler';
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
        $found_deed = false;



        if ($found_deed) {

            return redirect()->action('PlotController@show', ['id' => $found_deed->id]);
        } else {
            return redirect()->action('PlotController@create', $request);
        }
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
