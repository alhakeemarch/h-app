<?php

namespace App\Http\Controllers;

use App\MunicipalityBranch;
use Illuminate\Http\Request;

class MunicipalityBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = MunicipalityBranch::all();
        return view('municipalityBranch.index')->with('municipalities', $municipalities);
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
     * @param  \App\MunicipalityBranch  $municipalityBranch
     * @return \Illuminate\Http\Response
     */
    public function show(MunicipalityBranch $municipalityBranch)
    {
        return view('municipalityBranch.show')->with('municipalityBranch', $municipalityBranch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MunicipalityBranch  $municipalityBranch
     * @return \Illuminate\Http\Response
     */
    public function edit(MunicipalityBranch $municipalityBranch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MunicipalityBranch  $municipalityBranch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MunicipalityBranch $municipalityBranch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MunicipalityBranch  $municipalityBranch
     * @return \Illuminate\Http\Response
     */
    public function destroy(MunicipalityBranch $municipalityBranch)
    {
        //
    }




    const Municipality_Branchs1 = [
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
        'بلدية ابيار الماشي',
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


    public static function firstInsertion()
    {
        $aad_user_id = auth()->user()->id;
        $add_user_name = auth()->user()->user_name;

        $all_municipality_branchs = [
            [
                'code' => '0',
                'en_name' => 'Madinah Municipality',
                'ar_name' => 'أمانة المدينة المنورة',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '1',
                'en_name' => 'Al Haram Municipality',
                'ar_name' => 'بلدية الحرم',
                'area' => '1938433',
                'mi_prinx' => '16'
            ],
            [
                'code' => '2',
                'en_name' => 'Quba Municipality',
                'ar_name' => 'بلدية قباء',
                'area' => '500938348',
                'mi_prinx' => '18'
            ],
            [
                'code' => '3',
                'en_name' => 'Uhud Municipality',
                'ar_name' => 'بلدية أحد',
                'area' => '393640776',
                'mi_prinx' => '22'
            ],
            [
                'code' => '4',
                'en_name' => 'Awali Municipality',
                'ar_name' => 'بلدية العوالي',
                'area' => '634338184',
                'mi_prinx' => '19'
            ],
            [
                'code' => '5',
                'en_name' => 'Al Aqeeq Municipality',
                'ar_name' => 'بلدية العقيق',
                'area' => '272407698',
                'mi_prinx' => '22'
            ],
            [
                'code' => '6',
                'en_name' => 'Al Eyun Municipality',
                'ar_name' => 'بلدية العيون',
                'area' => '187306144',
                'mi_prinx' => '23'
            ],
            [
                'code' => '7',
                'en_name' => 'Al Baida Municipality',
                'ar_name' => 'بلدية البيداء',
                'area' => '511513528',
                'mi_prinx' => '24'
            ],

            [
                'code' => '9',
                'en_name' => 'Al Swaidra Municipality',
                'ar_name' => 'بلدية الصويدرة',
                'area' => '4372254158',
                'mi_prinx' => '28'
            ],
            [
                'code' => '11',
                'en_name' => 'Al Aqoul Municipality',
                'ar_name' => 'بلدية العاقول',
                'area' => '1000373813',
                'mi_prinx' => '20'
            ],
            [
                'code' => '12',
                'en_name' => 'Al Mleileh Municipality',
                'ar_name' => 'بلدية المليليح',
                'area' => '2111572515',
                'mi_prinx' => '21'
            ],
            [
                'code' => '13',
                'en_name' => 'Municipality',
                'ar_name' => 'بلدية المندسة',
                'area' => '1132136135',
                'mi_prinx' => '26'
            ],
            [
                'code' => '14',
                'en_name' => 'Al Mendasa Municipality',
                'ar_name' => 'بلدية ابيار الماشي',
                'area' => '2237184070',
                'mi_prinx' => '17'
            ],
            [
                'code' => '15',
                'en_name' => 'Al - Farish Municipality',
                'ar_name' => 'بلدية الفريش',
                'area' => '1749881844',
                'mi_prinx' => '27'
            ],
            [
                'code' => '',
                'en_name' => 'Women Municipality',
                'ar_name' => 'البدلية النسائية',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Hassou Municipality',
                'ar_name' => 'الحسو',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Hanakiyah Municipality',
                'ar_name' => 'الحناكية',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Sourouqia Municipality',
                'ar_name' => 'السويرقية',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Salsah Municipality',
                'ar_name' => 'الصلصلة',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Ashash Municipality',
                'ar_name' => 'العشاش',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Ula Municipality',
                'ar_name' => 'العلا',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Ais Municipality',
                'ar_name' => 'العيص',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Mesajeed and Al Qaha Municipality',
                'ar_name' => 'المسيجيد والقاحة',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Mahd Municipality',
                'ar_name' => 'المهد',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Al Nakheel Municipality',
                'ar_name' => 'النخيل',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Badur Municipality',
                'ar_name' => 'بدر',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Tharab Municipality',
                'ar_name' => 'ثرب',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Khibar Municipality',
                'ar_name' => 'خيبر',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Salelat Johinah And Al Murabaa Municipality',
                'ar_name' => 'سليلة جهينة والمربع',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Wadi Al Faraa Municipality',
                'ar_name' => 'وادي الفرع',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Yunbu Municipality',
                'ar_name' => 'ينبع',
                'area' => '',
                'mi_prinx' => ''
            ],
            [
                'code' => '',
                'en_name' => 'Yunbu Al Nakhel Municipality',
                'ar_name' => 'ينبع النخل',
                'area' => '',
                'mi_prinx' => ''
            ],
        ];
        if (MunicipalityBranch::all()->count() >= count($all_municipality_branchs)) {
            return false;
        }

        foreach ($all_municipality_branchs as $key => $a_branch) {
            $municipalityBranch = new MunicipalityBranch();
            $municipalityBranch->aad_user_id = $aad_user_id;
            $municipalityBranch->add_user_name = $add_user_name;
            foreach ($a_branch as $key => $value) {
                if ($value) {
                    $municipalityBranch->$key =  $value;
                }
            }
            $municipalityBranch->save();
        }
        return true;
    }
}
