<?php

namespace App\Http\Controllers;

use App\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nationality.index');
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
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show(Nationality $nationality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit(Nationality $nationality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nationality $nationality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nationality $nationality)
    {
        //
    }

    /**
     * inserts all available nationalities to db.
     *
     * @return BOOLEAN
     */
    public static function firstInsertion()
    {
        $nationalities = [
            ["Afghan" => "أفغانستان"],
            ["Albanian" => "ألبانيا"],
            ["Algerian" => "الجزائر"],
            ["American" => "أمريكا"],
            ["Andorran" => "أندورا"],
            ["Angolan" => "أنغوليا"],
            ["Antiguans" => "انتيغوا"],
            ["Argentinean" => "الأرجنتين"],
            ["Armenian" => "أرمينيا"],
            ["Australian" => "أستراليا"],
            ["Austrian" => "النمسا"],
            ["Azerbaijani" => "أذربيجان"],
            ["Bahamian" => "باهاما"],
            ["Bahraini" => "البحرين"],
            ["Bangladeshi" => "بنغلاديش"],
            ["Barbadian" => "باربادوس"],
            ["Barbudans" => "بربودا"],
            ["Botswana" => "بوتسوانا"],
            ["Belarusian" => "بيلاروسيا"],
            ["Belgian" => "بلجيكا"],
            ["Belizean" => "بليز"],
            ["Beninese" => "بنين"],
            ["Bhutanese" => "بوتان"],
            ["Bolivian" => "بوليفيا"],
            ["Bosnian" => "بوسنه"],
            ["Brazilian" => "البرازيل"],
            ["British" => "بريطانيا"],
            ["Bruneian" => "بروناي"],
            ["Bulgarian" => "بولغاريا"],
            ["Burkinabe" => "بوركينا فاسو"],
            ["Burmese" => "بورما"],
            ["Burundian" => "بوروندي"],
            ["Cambodian" => "كمبوديا"],
            ["Cameroonian" => "الكاميرون"],
            ["Canadian" => "كندا"],
            ["Cape Verdean" => "الرأس الأخضر"],
            ["Central African" => "جمهورية أفريقيا الوسطى"],
            ["Chadian" => "تشاد"],
            ["Chilean" => "تشيلي"],
            ["Chinese" => "الصين"],
            ["Colombian" => "كولومبيا"],
            ["Comoran" => "جزر القمر"],
            ["Congolese" => "جمهورية الكونغو الديموقراطية"],
            ["Costa Rican" => "كوستاريكا"],
            ["Croatian" => "كرواتيا"],
            ["Cuban" => "كوبا"],
            ["Cypriot" => "القبرص"],
            ["Czech" => "تشيك"],
            ["Danish" => "الدانمارك"],
            ["Djibouti" => "جيبوتي"],
            ["Dominican" => "الدومينيكان"],
            ["Dutch" => "هولندا"],
            ["East Timorese" => "تيمور الشرقية"],
            ["Ecuadorean" => "الإكوادور"],
            ["Egyptian" => "مصر"],
            ["Emirian" => "الإمارات"],
            ["Equatorial Guinean" => "غينيا الإستوائية"],
            ["Eritrean" => "إريتريا"],
            ["Estonian" => "إستونيا"],
            ["Ethiopian" => "إثيوبيا"],
            ["Fijian" => "فيجي"],
            ["Filipino" => "الفلبين"],
            ["Finnish" => "فنلندا"],
            ["French" => "فرنسا"],
            ["Gabonese" => "الجابون"],
            ["Gambian" => "غامبيا"],
            ["Georgian" => "جورجيا"],
            ["German" => "ألمانيا"],
            ["Ghanaian" => "غانا"],
            ["Greek" => "اليونان"],
            ["Grenadian" => "جرينادا"],
            ["Guatemalan" => "غواتيمالا"],
            ["Guinea-Bissauan" => "غينيا بيساو"],
            ["Guinean" => "غينيا"],
            ["Guyanese" => "غويانا"],
            ["Haitian" => "هايتي"],
            ["Herzegovinian" => "الهرسك"],
            ["Honduran" => "هندوراس"],
            ["Hungarian" => "هنغاريا"],
            ["I-Kiribati" => "كيريباتي"],
            ["Icelander" => "ايسلندا"],
            ["Indian" => "الهند"],
            ["Indonesian" => "اندونيسيا"],
            ["Iranian" => "ايران"],
            ["Iraqi" => "العراق"],
            ["Irish" => "جمهورية ايرلندا"],
            ["Israeli" => "إسرائيل"],
            ["Italian" => "إيطاليا"],
            ["Ivorian" => "ساحل العاج"],
            ["Jamaican" => "جامايكا"],
            ["Japanese" => "اليابان"],
            ["Jordanian" => "الاردن"],
            ["Kazakhstani" => "كازاخستان"],
            ["Kenyan" => "كينيا"],
            ["Kittian and Nevisian" => "سانت كيتس ونيفيس"],
            ["Kuwaiti" => "كويت"],
            ["Kyrgyz" => "قيرغيزستان"],
            ["Laotian" => "لاوس"],
            ["Latvian" => "لاتفيا"],
            ["Lebanese" => "لبنان"],
            ["Liberian" => "ليبيريا"],
            ["Libyan" => "ليبيا"],
            ["Liechtensteiner" => "ليختنشتاين"],
            ["Lithuanian" => "لتوانيا"],
            ["Luxembourger" => "لوكسمبورغ"],
            ["Macedonian" => "مقدونيا"],
            ["Malagasy" => "مدغشقر"],
            ["Malawian" => "مالاوي"],
            ["Malaysian" => "ماليزيا"],
            ["Maldivan" => "المالديف"],
            ["Malian" => "مالي"],
            ["Maltese" => "مالطا"],
            ["Marshallese" => "جزر المارشال"],
            ["Mauritanian" => "موريتانيا"],
            ["Mauritian" => "موريشيوس"],
            ["Mexican" => "المكسيك"],
            ["Micronesian" => "ميكرونيزيا"],
            ["Moldovan" => "مولدوفا"],
            ["Monacan" => "موناكو"],
            ["Mongolian" => "منغوليا"],
            ["Moroccan" => "المغرب"],
            ["Mosotho" => "ليسوتو"],
            ["Motswana" => ""],
            ["Mozambican" => "موزمبيق"],
            ["Namibian" => "ناميبيا"],
            ["Nauruan" => "ناورو"],
            ["Nepalese" => "النيبال"],
            ["New Zealander" => "نيوزيلندا"],
            ["Nicaraguan" => "نيكاراغوا"],
            ["Nigerian" => "نيجيريا"],
            ["Nigerien" => "النيجر"],
            ["North Korean" => "كويا الشمالية"],
            ["Northern Irish" => "ايرلندا الشمالية"],
            ["Norwegian" => "النرويج"],
            ["Omani" => "عمان"],
            ["Pakistani" => "باكستان"],
            ["Palauan" => "بالاو"],
            ["Panamanian" => "بنما"],
            ["Papua New Guinean" => "بابوا غينيا الجديدة"],
            ["Paraguayan" => "باراغواي"],
            ["Peruvian" => "بيرو"],
            ["Polish" => "بولندا"],
            ["Portuguese" => "البرتغال"],
            ["Qatari" => "قطر"],
            ["Romanian" => "رومانيا"],
            ["Russian" => "روسيا"],
            ["Rwandan" => "رواندا"],
            ["Saint Lucian" => "سانت لوسيا"],
            ["Salvadoran" => "سلفادور"],
            ["Samoan" => "ساموا"],
            ["San Marinese" => "سان مارينو"],
            ["Sao Tomean" => "ساو تومي"],
            ["Saudi" => "السعودية"],
            ["Scottish" => "اسكتلندا"],
            ["Senegalese" => "السنغال"],
            ["Serbian" => "صربيا"],
            ["Seychellois" => "سيشل"],
            ["Sierra Leonean" => "سيراليون"],
            ["Singaporean" => "سنغافورة"],
            ["Slovakian" => "سلوفاكيا"],
            ["Slovenian" => "سلوفينيا"],
            ["Solomon Islander" => "جزر سليمان"],
            ["Somali" => "الصومال"],
            ["South African" => "جنوب افريقيا"],
            ["South Korean" => "كوريا الجنوبية"],
            ["Spanish" => "اسبانيا"],
            ["Sri Lankan" => "سريلانكا"],
            ["Sudanese" => "السودان"],
            ["Surinamer" => "سورينام"],
            ["Swazi" => "سوازيلاند"],
            ["Swedish" => "السويد"],
            ["Swiss" => "سويسرا"],
            ["Syrian" => "سوريا"],
            ["Taiwanese" => "تايوان"],
            ["Tajik" => "طاجيكستان"],
            ["Tanzanian" => "تنزانيا"],
            ["Thai" => "تايلاند"],
            ["Togolese" => "توغو"],
            ["Tongan" => "تونجا"],
            ["Trinidadian/Tobagonian" => "ترينيداد / توباغو"],
            ["Tunisian" => "تونس"],
            ["Turkish" => "تركيا"],
            ["Tuvaluan" => "توفالو"],
            ["Ugandan" => "أوغندا"],
            ["Ukrainian" => "اوكرانيا"],
            ["Uruguayan" => "اوروغواي"],
            ["Uzbekistani" => "أوزباكستان"],
            ["Venezuelan" => "فنزويلا"],
            ["Vietnamese" => "فيتنام"],
            ["Welsh" => "ويلز"],
            ["Yemenite" => "اليمن"],
            ["Zambian" => "زامبيا"],
            ["Zimbabwean" => "زيمبابوي"],
        ];
        if (Nationality::all()->count() >= count($nationalities)) {
            return false;
        }

        foreach ($nationalities as $key => $value) {
            foreach ($value as $en_name => $ar_name) {
                $newNationaliti = new Nationality;
                $newNationaliti->created_by = '1';
                $newNationaliti->en_name = $en_name;
                $newNationaliti->ar_name = $ar_name;
                $newNationaliti->save();
            }
        }
        return true;
    }
}
