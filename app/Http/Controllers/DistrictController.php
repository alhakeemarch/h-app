<?php

namespace App\Http\Controllers;

use App\District;
use App\MunicipalityBranch;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::all();
        return view('district.index')->with('districts', $districts);
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
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        return view('district.show')->with('district', $district);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }



    public static function firstInsertion()
    {

        $all_districts = [
            [
                'code' => '1',
                // 'en_name' => '',
                'ar_name' => 'منطقة المسجد النبوي',
                'area' => '1938433',
                'mi_prinx' => '68',
                'municipality_branche_code' => '1',
            ],
            [
                'code' => '2',
                // 'en_name' => '',
                'ar_name' => 'منطقة المستراح',
                'area' => '3105590',
                'mi_prinx' => '69',
                'municipality_branche_code' => '3'
            ],
            [
                'code' => '3',
                // 'en_name' => '',
                'ar_name' => 'منطقة الأوس',
                'area' => '4644364',
                'mi_prinx' => '70',
                'municipality_branche_code' => '3'
            ],
            [
                'code' => '4',
                // 'en_name' => '',
                'ar_name' => 'منطقة حرة واقم',
                'area' => '6344720',
                'mi_prinx' => '71',
                'municipality_branche_code' => '4'
            ],
            [
                'code' => '5',
                // 'en_name' => '',
                'ar_name' => 'منطقة العالية',
                'area' => '2125405',
                'mi_prinx' => '72',
                'municipality_branche_code' => '2'
            ],
            [
                'code' => '6',
                // 'en_name' => '',
                'ar_name' => 'منطقة اللابة',
                'area' => '6859479',
                'mi_prinx' => '73',
                'municipality_branche_code' => '4'
            ],
            [
                'code' => '7',
                // 'en_name' => '',
                'ar_name' => 'منطقة قباء',
                'area' => '11610742',
                'mi_prinx' => '74',
                'municipality_branche_code' => '2'
            ],
            [
                'code' => '8',
                // 'en_name' => '',
                'ar_name' => 'منطقة بطحان',
                'area' => '3931424',
                'mi_prinx' => '75',
                'municipality_branche_code' => '4'
            ],
            [
                'code' => '9',
                // 'en_name' => '',
                'ar_name' => 'منطقة الخزرج',
                'area' => '1936932',
                'mi_prinx' => '76',
                'municipality_branche_code' => '5'
            ],
            [
                'code' => '10',
                // 'en_name' => '',
                'ar_name' => 'منطقة الخندق',
                'area' => '3662585',
                'mi_prinx' => '77',
                'municipality_branche_code' => '6'
            ],
            [
                'code' => '11',
                // 'en_name' => '',
                'ar_name' => 'منطقة أحد',
                'area' => '29520988',
                'mi_prinx' => '78',
                'municipality_branche_code' => '3'
            ],
            [
                'code' => '12',
                // 'en_name' => '',
                'ar_name' => 'منطقة قناة',
                'area' => '29302659',
                'mi_prinx' => '79',
                'municipality_branche_code' => '4'
            ],
            [
                'code' => '13',
                // 'en_name' => '',
                'ar_name' => 'منطقة ميطان',
                'area' => '27932878',
                'mi_prinx' => '80',
                'municipality_branche_code' => '4'
            ],
            [
                'code' => '14',
                // 'en_name' => '',
                'ar_name' => 'منطقة المناهل',
                'area' => '30150392',
                'mi_prinx' => '81',
                'municipality_branche_code' => '2'
            ],
            [
                'code' => '15',
                // 'en_name' => '',
                'ar_name' => 'منطقة الهجرة',
                'area' => '1938433',
                'mi_prinx' => '82',
                'municipality_branche_code' => '2'
            ],
            [
                'code' => '16',
                // 'en_name' => '',
                'ar_name' => 'منطقة العقيق',
                'area' => '27513184',
                'mi_prinx' => '83',
                'municipality_branche_code' => '5'
            ],
            [
                'code' => '17',
                // 'en_name' => '',
                'ar_name' => 'منطقة بنى سلمة',
                'area' => '7767187',
                'mi_prinx' => '84',
                'municipality_branche_code' => '5'
            ],
            [
                'code' => '18',
                // 'en_name' => '',
                'ar_name' => 'منطقة الجرف',
                'area' => '17893210',
                'mi_prinx' => '85',
                'municipality_branche_code' => '6'
            ],
            [
                'code' => '19',
                // 'en_name' => '',
                'ar_name' => 'منطقة الزبير',
                'area' => '55703612',
                'mi_prinx' => '86',
                'municipality_branche_code' => '3'
            ],
            [
                'code' => '20',
                // 'en_name' => '',
                'ar_name' => 'منطقة جبل عير',
                'area' => '39557446',
                'mi_prinx' => '87',
                'municipality_branche_code' => '2'
            ],
            [
                'code' => '21',
                // 'en_name' => '',
                'ar_name' => 'منطقة حمراء الأسد',
                'area' => '233310735',
                'mi_prinx' => '88',
                'municipality_branche_code' => '5'
            ],
            [
                'code' => '22',
                // 'en_name' => '',
                'ar_name' => 'منطقة البيداء',
                'area' => '99668917',
                'mi_prinx' => '89',
                'municipality_branche_code' => '7'
            ],
            [
                'code' => '23',
                // 'en_name' => '',
                'ar_name' => 'منطقة الربوة',
                'area' => '42204004',
                'mi_prinx' => '90',
                'municipality_branche_code' => '6'
            ],
            [
                'code' => '24',
                // 'en_name' => '',
                'ar_name' => 'منطقة الخليل',
                'area' => '123546309',
                'mi_prinx' => '91',
                'municipality_branche_code' => '6'
            ],
            [
                'code' => '25',
                // 'en_name' => '',
                'ar_name' => 'منطقة تيم',
                'area' => '531554481',
                'mi_prinx' => '92',
                'municipality_branche_code' => '4'
            ],
            [
                'code' => '26',
                // 'en_name' => '',
                'ar_name' => 'منطقة سلع',
                'area' => '1879660',
                'mi_prinx' => '93',
                'municipality_branche_code' => '5'
            ],
            [
                'code' => '27',
                // 'en_name' => '',
                'ar_name' => 'منطقة الفرائد',
                'area' => '23696333',
                'mi_prinx' => '94',
                'municipality_branche_code' => '4'
            ],
            [
                'code' => '28',
                // 'en_name' => '',
                'ar_name' => 'منطقة جبل أعظم',
                'area' => '411844611',
                'mi_prinx' => '95',
                'municipality_branche_code' => '7'
            ],
            [
                'code' => '29',
                // 'en_name' => '',
                'ar_name' => 'منطقة الحليات',
                'area' => '373357059',
                'mi_prinx' => '96',
                'municipality_branche_code' => '2'
            ],
            [
                'code' => '31',
                // 'en_name' => '',
                'ar_name' => 'منطقة بطحان',
                'area' => '2703497',
                'mi_prinx' => '97',
                'municipality_branche_code' => '2'
            ],
            [
                'code' => '35',
                // 'en_name' => '',
                'ar_name' => 'منطقة العالـية',
                'area' => '4716210',
                'mi_prinx' => '98',
                'municipality_branche_code' => '4'
            ],
            [
                'code' => '45',
                // 'en_name' => '',
                'ar_name' => 'منطقة البيضاء',
                'area' => '300666222',
                'mi_prinx' => '99',
                'municipality_branche_code' => '3'
            ],
            [
                'code' => '47',
                // 'en_name' => '',
                'ar_name' => 'منطقة الفريش',
                'area' => '1749881844',
                'mi_prinx' => '100',
                'municipality_branche_code' => '15'
            ],
            [
                'code' => '51',
                // 'en_name' => '',
                'ar_name' => 'منطقة ابيار الماشي',
                'area' => '2237184070',
                'mi_prinx' => '101',
                'municipality_branche_code' => '14'
            ],
            [
                'code' => '52',
                // 'en_name' => '',
                'ar_name' => 'منطقة المليليح',
                'area' => '2111572515',
                'mi_prinx' => '102',
                'municipality_branche_code' => '12'
            ],
            [
                'code' => '52',
                // 'en_name' => '',
                'ar_name' => 'منطقة الصويدرة',
                'area' => '4372254158',
                'mi_prinx' => '103',
                'municipality_branche_code' => '9'
            ],
            [
                'code' => '55',
                // 'en_name' => '',
                'ar_name' => 'منطقة المندسة',
                'area' => '1132136135',
                'mi_prinx' => '104',
                'municipality_branche_code' => '13'
            ],
            [
                'code' => '56',
                // 'en_name' => '',
                'ar_name' => 'منطقة العوينة',
                'area' => '837860663',
                'mi_prinx' => '105',
                'municipality_branche_code' => '11'
            ],
            [
                'code' => '180',
                // 'en_name' => '',
                'ar_name' => 'منطقة تيم2',
                'area' => '162513150',
                'mi_prinx' => '106',
                'municipality_branche_code' => '11'
            ],
        ];

        if (District::all()->count() >= count($all_districts)) {
            return false;
        }

        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->user_name;
        $all_municipality_branchs = MunicipalityBranch::all();

        foreach ($all_districts as $district) {
            $a_district = new District();

            $a_district->created_by_id = $created_by_id;
            $a_district->created_by_name = $created_by_name;
            $municipality_branche_id = '';
            $municipality_branche_ar_name = '';
            $municipality_branche_en_name = '';

            foreach ($all_municipality_branchs as $municipality_branch) {
                if ($municipality_branch['code']) {
                    if ($municipality_branch['code'] == $district['municipality_branche_code']) {

                        $municipality_branche_id = $municipality_branch['id'];
                        $municipality_branche_ar_name = $municipality_branch['ar_name'];
                        $municipality_branche_en_name = $municipality_branch['en_name'];
                    }
                }
            }

            $a_district->municipality_branche_id = $municipality_branche_id;
            $a_district->municipality_branche_ar_name = $municipality_branche_ar_name;
            $a_district->municipality_branche_en_name = $municipality_branche_en_name;

            foreach ($district as $key => $value) {
                if ($value) {
                    $a_district->$key =  $value;
                }
            }

            $a_district->save();
        }
        return true;
    }
}
