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
    public function create()
    {
        // return App\Http\Controllers\PlotController::getDistricts();

        $districts = $this->getDistricts();
        // $districts = self::getDistricts();
        return view('plot.create')->with('districts', $districts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        validator([
            // 'deed_no' => '',
            // 'deed_date' => '',
            // 'plot_no' => '',
            // 'plan_name' => '',
            // 'area' => '',
            // 'district' => '',
            // 'road_code' => '',
            // 'road_name' => ''
        ]);

        return $request->all();
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
