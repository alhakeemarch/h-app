<?php

namespace App\Http\Controllers;

use App\SaudiCity;
use Illuminate\Http\Request;

class SaudiCityController extends Controller
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
    public function index()
    {
        $saudi_cities = SaudiCity::all();
        return view('saudiCity.index')->with('saudi_cities', $saudi_cities);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaudiCity  $saudiCity
     * @return \Illuminate\Http\Response
     */
    public function show(SaudiCity $saudiCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaudiCity  $saudiCity
     * @return \Illuminate\Http\Response
     */
    public function edit(SaudiCity $saudiCity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaudiCity  $saudiCity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaudiCity $saudiCity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaudiCity  $saudiCity
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaudiCity $saudiCity)
    {
        //
    }

    // -----------------------------------------------------------------------------------------------------------------
    public static function firstInsertion()
    {
        $cities = array(
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الرياض',
                'en_city_name' => 'Riyadh',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الخرج',
                'en_city_name' => 'Al Kharj',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الزلفي',
                'en_city_name' => 'Zulfi ',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الدوادمي',
                'en_city_name' => 'Dawadmi',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'وادي الدواسر',
                'en_city_name' => 'Wadi Al-Dawasir',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الحوطة/ حوطة بني تميم',
                'en_city_name' => 'Hotat Bani Tamim',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الأفلاج',
                'en_city_name' => 'Aflaj',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الدرعية',
                'en_city_name' => 'Diriyah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'المجمعة',
                'en_city_name' => 'Al Majmaah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'القويعية',
                'en_city_name' => 'Al-Gweiiyyah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'شقراء',
                'en_city_name' => 'Shaqraa',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'عفيف',
                'en_city_name' => 'Afif',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الغاط',
                'en_city_name' => 'al-Ghat',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'السليل',
                'en_city_name' => 'As Sulayyil',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'ضرما',
                'en_city_name' => 'Dhurma',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'المزاحمية',
                'en_city_name' => 'Muzahmiyya',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'رماح',
                'en_city_name' => 'Rimah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'ثادق',
                'en_city_name' => 'Thadiq',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'حريملاء',
                'en_city_name' => 'Huraymila',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'الحريق',
                'en_city_name' => 'Al-Hareeq',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الرياض',
                'en_region_name' => 'Riyadh',
                'ar_city_name' => 'مرات',
                'en_city_name' => ' Marat',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'مكة المكرمة',
                'en_city_name' => 'Mecca',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'جدة',
                'en_city_name' => 'Jeddah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'الطائف',
                'en_city_name' => 'Taif',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'القنفذة',
                'en_city_name' => 'Al Qunfudhah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'الليث',
                'en_city_name' => 'Al-Lith ',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'رابغ',
                'en_city_name' => 'Rabigh',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'خليص',
                'en_city_name' => 'Khulays',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'الخرمة',
                'en_city_name' => 'Al-Khurmah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'رنية',
                'en_city_name' => 'Ranyah ',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'تربة',
                'en_city_name' => 'Turubah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'الجموم',
                'en_city_name' => 'Al-Jumum ',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'الكامل',
                'en_city_name' => 'Al-Kamil',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'المويه',
                'en_city_name' => 'Moya',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'ميسان',
                'en_city_name' => 'Mesaan',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'أضم',
                'en_city_name' => 'Adam',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'العرضيات',
                'en_city_name' => 'Aredaat',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'مكة المكرمة',
                'en_region_name' => 'Mecca',
                'ar_city_name' => 'بحرة',
                'en_city_name' => 'Bahra',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'المدينة المنورة',
                'en_city_name' => 'Medina',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'ينبع',
                'en_city_name' => 'Yanbu',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'العلا',
                'en_city_name' => 'Al-Ula',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'المهد',
                'en_city_name' => 'AL-Mahd ',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'الحناكية',
                'en_city_name' => 'Al Hunakiyah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'بدر',
                'en_city_name' => 'Badr',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'خيبر',
                'en_city_name' => 'Khaybar',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'العيص',
                'en_city_name' => 'Al-Ayes',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المدينة المنورة',
                'en_region_name' => 'Medina',
                'ar_city_name' => 'وادي الفرع',
                'en_city_name' => 'Wadi-ALfaraa',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'بريدة',
                'en_city_name' => 'Buraydah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'عنيزة',
                'en_city_name' => 'Unaizah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'الرس',
                'en_city_name' => 'Ar Rass',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'المذنب',
                'en_city_name' => 'Al-Muznib',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'البكيرية',
                'en_city_name' => 'Al-Bukairiyah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'البدائع',
                'en_city_name' => 'Al-Badayea',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'الأسياح',
                'en_city_name' => 'Asyah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'النبهانية',
                'en_city_name' => 'Al nabhaniah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'الشماسية',
                'en_city_name' => 'Al shamasiah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'عيون الجواء',
                'en_city_name' => 'Uyun AlJiwa',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'رياض الخبراء',
                'en_city_name' => 'Riyadh Al-Khabra',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'عقلة الصقور',
                'en_city_name' => 'Aqlat AL swqoor',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'القصيم',
                'en_region_name' => 'Qassim',
                'ar_city_name' => 'ضرية',
                'en_city_name' => 'Dheriah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'الدمام',
                'en_city_name' => 'Dammam',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'الأحساء',
                'en_city_name' => 'Al-Ahsa',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'حفر الباطن',
                'en_city_name' => 'Hafr Al-Batin',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'الجبيل',
                'en_city_name' => 'Jubail',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'القطيف',
                'en_city_name' => 'Qatif',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'الخبر',
                'en_city_name' => 'Khobar',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'الخفجي',
                'en_city_name' => 'Khafji',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'رأس تنورة',
                'en_city_name' => 'Ras Tanura',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'بقيق',
                'en_city_name' => 'Abqaiq',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'النعيرية',
                'en_city_name' => 'Nariyah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'قرية العليا',
                'en_city_name' => 'Qaryat al-Ulya',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'المنطقة الشرقية',
                'en_region_name' => 'Eastren Province',
                'ar_city_name' => 'العديد',
                'en_city_name' => 'AL Adeed',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'أبها',
                'en_city_name' => 'Abha',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'خميس مشيط',
                'en_city_name' => 'Khamis Mushayt',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'بيشة',
                'en_city_name' => 'Bisha',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'النماص',
                'en_city_name' => 'An-Namas',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'محايل',
                'en_city_name' => 'Muhayil',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'ظهران الجنوب',
                'en_city_name' => 'Zahran Al-Janub',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'تثليث',
                'en_city_name' => 'Tathlith',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'سراة عبيدة',
                'en_city_name' => 'Sarat Abidah ',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'رجال ألمع',
                'en_city_name' => 'Rijal Alma',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'بلقرن',
                'en_city_name' => 'Balqarn',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'أحد رفيدة',
                'en_city_name' => 'Ahad Rifaydah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'المجاردة',
                'en_city_name' => 'Al-Majardah ',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'البرك',
                'en_city_name' => 'Baraq',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'بارق',
                'en_city_name' => 'Bareg',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => 'تنومة',
                'en_city_name' => 'Tanomah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'عسير',
                'en_region_name' => 'Asir',
                'ar_city_name' => ' طريب',
                'en_city_name' => 'Tareeb',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'تبوك',
                'en_region_name' => 'Tabuk',
                'ar_city_name' => 'تبوك',
                'en_city_name' => 'Tabuk',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'تبوك',
                'en_region_name' => 'Tabuk',
                'ar_city_name' => 'الوجه',
                'en_city_name' => 'Al Wajh',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'تبوك',
                'en_region_name' => 'Tabuk',
                'ar_city_name' => 'ضباء',
                'en_city_name' => 'Duba',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'تبوك',
                'en_region_name' => 'Tabuk',
                'ar_city_name' => 'تيماء',
                'en_city_name' => 'Tayma',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'تبوك',
                'en_region_name' => 'Tabuk',
                'ar_city_name' => 'أملج',
                'en_city_name' => 'Omloj',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'تبوك',
                'en_region_name' => 'Tabuk',
                'ar_city_name' => 'حقل',
                'en_city_name' => 'Haql',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'تبوك',
                'en_region_name' => 'Tabuk',
                'ar_city_name' => 'البدع',
                'en_city_name' => 'Al bedaa',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'حائل',
                'en_region_name' => 'Hail',
                'ar_city_name' => 'حائل',
                'en_city_name' => 'Hail',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'حائل',
                'en_region_name' => 'Hail',
                'ar_city_name' => 'بقعاء',
                'en_city_name' => 'Buqa',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'حائل',
                'en_region_name' => 'Hail',
                'ar_city_name' => 'الغزالة',
                'en_city_name' => 'Al-Ghazalah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'حائل',
                'en_region_name' => 'Hail',
                'ar_city_name' => 'الشنان',
                'en_city_name' => 'Ash-Shnan',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'حائل',
                'en_region_name' => 'Hail',
                'ar_city_name' => 'الحائط',
                'en_city_name' => 'Al-Hayet',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'حائل',
                'en_region_name' => 'Hail',
                'ar_city_name' => 'السليمي',
                'en_city_name' => 'Al-Sulaimi',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'حائل',
                'en_region_name' => 'Hail',
                'ar_city_name' => 'الشملي',
                'en_city_name' => 'Ash-Shamli',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'حائل',
                'en_region_name' => 'Hail',
                'ar_city_name' => 'موقق',
                'en_city_name' => 'Mawqaq',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'منطقة الحدود الشمالية',
                'en_region_name' => 'Northern borders area',
                'ar_city_name' => 'عرعر',
                'en_city_name' => 'ARar',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'منطقة الحدود الشمالية',
                'en_region_name' => 'Northern borders area',
                'ar_city_name' => 'رفحا',
                'en_city_name' => 'Rafha',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'منطقة الحدود الشمالية',
                'en_region_name' => 'Northern borders area',
                'ar_city_name' => 'طريف',
                'en_city_name' => 'Taif',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'منطقة الحدود الشمالية',
                'en_region_name' => 'Northern borders area',
                'ar_city_name' => 'العويقيلة',
                'en_city_name' => 'Al ewaiqaliah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'جازان',
                'en_city_name' => 'Jizan',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'صبياء',
                'en_city_name' => 'Sabya',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'أبو عريش',
                'en_city_name' => 'Abu Arish',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'صامطة',
                'en_city_name' => 'Samtah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'بيش',
                'en_city_name' => 'Baish',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'الدرب',
                'en_city_name' => 'Alddarb',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'الحرث',
                'en_city_name' => 'Alharth',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'ضمد',
                'en_city_name' => 'Damad',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'الريث',
                'en_city_name' => 'Alraith',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'فرسان',
                'en_city_name' => 'Farasan ',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'الدائر',
                'en_city_name' => 'Alddair',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'العارضة',
                'en_city_name' => 'Alaridah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'أحد المسارحة',
                'en_city_name' => 'Ahad Almasarihah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'العيدابي',
                'en_city_name' => 'Alaydabi',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'فيفاء',
                'en_city_name' => 'Fifaa',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => ' الطوال',
                'en_city_name' => 'ALtwaal',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'جازان',
                'en_region_name' => 'Jizan',
                'ar_city_name' => 'الهروب',
                'en_city_name' => 'ALharoob',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'نجران',
                'en_region_name' => 'Najran',
                'ar_city_name' => 'نجران',
                'en_city_name' => 'Najran',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'نجران',
                'en_region_name' => 'Najran',
                'ar_city_name' => 'شرورة',
                'en_city_name' => 'Sharurah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'نجران',
                'en_region_name' => 'Najran',
                'ar_city_name' => 'حبونا',
                'en_city_name' => 'Hayona',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'نجران',
                'en_region_name' => 'Najran',
                'ar_city_name' => 'بدر الجنوب',
                'en_city_name' => 'Badr aljanoob',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'نجران',
                'en_region_name' => 'Najran',
                'ar_city_name' => 'يدمة',
                'en_city_name' => 'Yadamah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'نجران',
                'en_region_name' => 'Najran',
                'ar_city_name' => 'ثار',
                'en_city_name' => 'Thar',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'نجران',
                'en_region_name' => 'Najran',
                'ar_city_name' => 'خباش',
                'en_city_name' => 'Khabash',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'نجران',
                'en_region_name' => 'Najran',
                'ar_city_name' => 'الخرخير',
                'en_city_name' => 'khar kheer',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'الباحة',
                'en_city_name' => 'Al Baha',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'بلجرشي',
                'en_city_name' => 'Baljurashi',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'المندق',
                'en_city_name' => 'Al mandaq',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'المخواة',
                'en_city_name' => 'Al Mikhwah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => ' قلوة',
                'en_city_name' => 'Qelwa',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'العقيق',
                'en_city_name' => 'Alaqeeq',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'القرى',
                'en_city_name' => 'AL qura',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'غامد الزناد',
                'en_city_name' => 'Ghamed al zenad',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'الحجرة',
                'en_city_name' => 'Hajrah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الباحة',
                'en_region_name' => 'Al Baha',
                'ar_city_name' => 'بني حسن',
                'en_city_name' => 'Bani hassan',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الجوف',
                'en_region_name' => 'Al Jawf',
                'ar_city_name' => 'سكاكا',
                'en_city_name' => 'Sakakah',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الجوف',
                'en_region_name' => 'Al Jawf',
                'ar_city_name' => 'القريات',
                'en_city_name' => 'Gurayat',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الجوف',
                'en_region_name' => 'Al Jawf',
                'ar_city_name' => 'دومة الجندل',
                'en_city_name' => 'Dumat Al-Jandal',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],
            [
                'ar_region_name' => 'الجوف',
                'en_region_name' => 'Al Jawf',
                'ar_city_name' => 'طبرجل',
                'en_city_name' => 'Tabarjal',
                'created_by_id' => auth()->user()->id,
                'created_by_name' => auth()->user()->user_name,
            ],


        );
        /*******************************************************************************************************/
        if (SaudiCity::all()->count() >= count($cities)) {
            return false;
        }
        // -------------------------------------
        foreach ($cities as $city) {
            $new_city = new SaudiCity;
            $new_city->create($city);
        }
        return true;
    }
}
