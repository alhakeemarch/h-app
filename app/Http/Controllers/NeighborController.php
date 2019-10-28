<?php

namespace App\Http\Controllers;

use App\District;
use App\Neighbor;
use App\MunicipalityBranch;
use Illuminate\Http\Request;

class NeighborController extends Controller
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
     * @param  \App\Neighbor  $neighbor
     * @return \Illuminate\Http\Response
     */
    public function show(Neighbor $neighbor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Neighbor  $neighbor
     * @return \Illuminate\Http\Response
     */
    public function edit(Neighbor $neighbor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Neighbor  $neighbor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Neighbor $neighbor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Neighbor  $neighbor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neighbor $neighbor)
    {
        //
    }







    public static function firstInsertion()
    {
        $all_neighbors = [
            ['ar_name' => 'حى النقمى', 'district_code' => '19', 'code' => '3', 'municipality_branche_code' => '3', 'area' => '4744371', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '260'],
            ['ar_name' => 'حى وعيرة', 'district_code' => '19', 'code' => '4', 'municipality_branche_code' => '3', 'area' => '13470175', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '261'],
            ['ar_name' => 'حى المطار', 'district_code' => '19', 'code' => '5', 'municipality_branche_code' => '3', 'area' => '16135995', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '262'],
            ['ar_name' => 'حى الصناعية', 'district_code' => '21', 'code' => '4', 'municipality_branche_code' => '5', 'area' => '15815971', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '263'],
            ['ar_name' => 'حى بنى عبد الأشهل', 'district_code' => '3', 'code' => '1', 'municipality_branche_code' => '3', 'area' => '1217446', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '264'],
            ['ar_name' => 'حى بنى حارثة', 'district_code' => '3', 'code' => '2', 'municipality_branche_code' => '3', 'area' => '3426917', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '265'],
            ['ar_name' => 'حى الشهداء', 'district_code' => '11', 'code' => '1', 'municipality_branche_code' => '3', 'area' => '3492771', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '266'],
            ['ar_name' => 'حى التلعة', 'district_code' => '11', 'code' => '2', 'municipality_branche_code' => '3', 'area' => '2407383', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '267'],
            ['ar_name' => 'حى الدار', 'district_code' => '11', 'code' => '3', 'municipality_branche_code' => '3', 'area' => '4868117', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '268'],
            ['ar_name' => 'حي جبل أحد', 'district_code' => '11', 'code' => '4', 'municipality_branche_code' => '3', 'area' => '18752717', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '269'],
            ['ar_name' => 'حى الخضراء', 'district_code' => '56', 'code' => '3', 'municipality_branche_code' => '11', 'area' => '38542969', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '270'],
            ['ar_name' => 'حي الشرائع', 'district_code' => '29', 'code' => '1', 'municipality_branche_code' => '2', 'area' => '17359294', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '271'],
            ['ar_name' => 'حى حرة الوبرة', 'district_code' => '16', 'code' => '1', 'municipality_branche_code' => '5', 'area' => '1474960', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '272'],
            ['ar_name' => 'حى الغابة', 'district_code' => '19', 'code' => '1', 'municipality_branche_code' => '3', 'area' => '8477292', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '221'],
            ['ar_name' => 'حى بنى معاوية', 'district_code' => '4', 'code' => '1', 'municipality_branche_code' => '4', 'area' => '1491961', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '222'],
            ['ar_name' => 'حى العريض', 'district_code' => '4', 'code' => '2', 'municipality_branche_code' => '4', 'area' => '4852759', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '223'],
            ['ar_name' => 'حى الأسكان', 'district_code' => '6', 'code' => '1', 'municipality_branche_code' => '4', 'area' => '3780524', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '224'],
            ['ar_name' => 'حى الخالدية', 'district_code' => '6', 'code' => '2', 'municipality_branche_code' => '4', 'area' => '3078955', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '225'],
            ['ar_name' => 'حى شظاة', 'district_code' => '12', 'code' => '1', 'municipality_branche_code' => '4', 'area' => '4386749', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '226'],
            ['ar_name' => 'حى السد', 'district_code' => '14', 'code' => '2', 'municipality_branche_code' => '2', 'area' => '4127217', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '227'],
            ['ar_name' => 'حى السقيا', 'district_code' => '9', 'code' => '1', 'municipality_branche_code' => '5', 'area' => '810907', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '228'],
            ['ar_name' => 'حى المبعوث', 'district_code' => '12', 'code' => '2', 'municipality_branche_code' => '4', 'area' => '7350566', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '229'],
            ['ar_name' => 'حي بني خدرة', 'district_code' => '1', 'code' => '4', 'municipality_branche_code' => '1', 'area' => '470538', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '230'],
            ['ar_name' => 'حى بني النجار', 'district_code' => '1', 'code' => '5', 'municipality_branche_code' => '1', 'area' => '205189', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '231'],
            ['ar_name' => 'الحرم الشريف', 'district_code' => '1', 'code' => '6', 'municipality_branche_code' => '1', 'area' => '434670', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '232'],
            ['ar_name' => 'حي الجمعة', 'district_code' => '7', 'code' => '1', 'municipality_branche_code' => '2', 'area' => '1763711', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '233'],
            ['ar_name' => 'حى المغيسلة', 'district_code' => '7', 'code' => '2', 'municipality_branche_code' => '2', 'area' => '1402801', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '234'],
            ['ar_name' => 'حى الظاهرة', 'district_code' => '7', 'code' => '4', 'municipality_branche_code' => '2', 'area' => '1950154', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '235'],
            ['ar_name' => 'حي بضاعة', 'district_code' => '1', 'code' => '1', 'municipality_branche_code' => '1', 'area' => '286623', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '236'],
            ['ar_name' => 'حي المناخة', 'district_code' => '1', 'code' => '2', 'municipality_branche_code' => '1', 'area' => '244969', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '237'],
            ['ar_name' => 'حي النقا', 'district_code' => '1', 'code' => '3', 'municipality_branche_code' => '1', 'area' => '296444', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '238'],
            ['ar_name' => 'حى العصبة', 'district_code' => '7', 'code' => '5', 'municipality_branche_code' => '2', 'area' => '2465874', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '239'],
            ['ar_name' => 'حي الخاتم', 'district_code' => '7', 'code' => '6', 'municipality_branche_code' => '2', 'area' => '2893455', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '240'],
            ['ar_name' => 'حى الروابى', 'district_code' => '14', 'code' => '1', 'municipality_branche_code' => '2', 'area' => '7626484', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '241'],
            ['ar_name' => 'حى الغراء', 'district_code' => '14', 'code' => '3', 'municipality_branche_code' => '2', 'area' => '4671900', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '242'],
            ['ar_name' => 'حى الرمانة', 'district_code' => '14', 'code' => '4', 'municipality_branche_code' => '2', 'area' => '4972601', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '243'],
            ['ar_name' => 'حى نبلاء', 'district_code' => '14', 'code' => '5', 'municipality_branche_code' => '2', 'area' => '8752189', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '244'],
            ['ar_name' => 'حي الحديقة', 'district_code' => '15', 'code' => '1', 'municipality_branche_code' => '2', 'area' => '3908943', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '245'],
            ['ar_name' => 'حى القصواء', 'district_code' => '15', 'code' => '2', 'municipality_branche_code' => '2', 'area' => '3135257', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '246'],
            ['ar_name' => 'حى الرانوناء', 'district_code' => '15', 'code' => '4', 'municipality_branche_code' => '2', 'area' => '9943516', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '247'],
            ['ar_name' => 'حى رهط', 'district_code' => '15', 'code' => '5', 'municipality_branche_code' => '2', 'area' => '9914617', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '248'],
            ['ar_name' => 'حى الجصة', 'district_code' => '15', 'code' => '6', 'municipality_branche_code' => '2', 'area' => '6980788', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '249'],
            ['ar_name' => 'حى أبوبريقاء', 'district_code' => '20', 'code' => '1', 'municipality_branche_code' => '2', 'area' => '3241300', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '250'],
            ['ar_name' => 'حى الجابرة', 'district_code' => '20', 'code' => '2', 'municipality_branche_code' => '2', 'area' => '3203590', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '251'],
            ['ar_name' => 'حى بنى بياضة', 'district_code' => '20', 'code' => '3', 'municipality_branche_code' => '2', 'area' => '1836364', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '252'],
            ['ar_name' => 'حى الشهباء', 'district_code' => '20', 'code' => '5', 'municipality_branche_code' => '2', 'area' => '2631930', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '253'],
            ['ar_name' => 'حي جبل عير', 'district_code' => '20', 'code' => '6', 'municipality_branche_code' => '2', 'area' => '16599699', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '254'],
            ['ar_name' => 'حى خاخ', 'district_code' => '29', 'code' => '3', 'municipality_branche_code' => '2', 'area' => '31267144', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '255'],
            ['ar_name' => 'حي المزيين', 'district_code' => '29', 'code' => '4', 'municipality_branche_code' => '2', 'area' => '26884407', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '256'],
            ['ar_name' => 'حى المصانع', 'district_code' => '2', 'code' => '1', 'municipality_branche_code' => '3', 'area' => '1409426', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '257'],
            ['ar_name' => 'حى مسجد الدرع', 'district_code' => '2', 'code' => '2', 'municipality_branche_code' => '3', 'area' => '1696164', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '258'],
            ['ar_name' => 'حى الشافية', 'district_code' => '19', 'code' => '2', 'municipality_branche_code' => '3', 'area' => '12875780', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '259'],
            ['ar_name' => 'حى الصهوة', 'district_code' => '56', 'code' => '4', 'municipality_branche_code' => '11', 'area' => '414113882', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '328'],
            ['ar_name' => 'حى الدويمة', 'district_code' => '7', 'code' => '3', 'municipality_branche_code' => '2', 'area' => '1134747', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '273'],
            ['ar_name' => 'حي الاناهي', 'district_code' => '27', 'code' => '1', 'municipality_branche_code' => '4', 'area' => '23696333', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '274'],
            ['ar_name' => 'حى العهن', 'district_code' => '31', 'code' => '2', 'municipality_branche_code' => '2', 'area' => '2703497', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '275'],
            ['ar_name' => 'حى قربان', 'district_code' => '5', 'code' => '1', 'municipality_branche_code' => '2', 'area' => '2125405', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '276'],
            ['ar_name' => 'حي وادي مهزور', 'district_code' => '8', 'code' => '1', 'municipality_branche_code' => '4', 'area' => '3931424', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '277'],
            ['ar_name' => 'حى الدويخلة', 'district_code' => '12', 'code' => '3', 'municipality_branche_code' => '4', 'area' => '6272898', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '278'],
            ['ar_name' => 'حى القبيبة', 'district_code' => '56', 'code' => '5', 'municipality_branche_code' => '11', 'area' => '285659728', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '335'],
            ['ar_name' => 'حي العاقول', 'district_code' => '180', 'code' => '1', 'municipality_branche_code' => '11', 'area' => '21163955', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '279'],
            ['ar_name' => 'حى بنى ظفر', 'district_code' => '35', 'code' => '1', 'municipality_branche_code' => '4', 'area' => '3220520', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '280'],
            ['ar_name' => 'حى الشريبات', 'district_code' => '35', 'code' => '3', 'municipality_branche_code' => '4', 'area' => '1495689', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '281'],
            ['ar_name' => 'حى البركة', 'district_code' => '18', 'code' => '2', 'municipality_branche_code' => '6', 'area' => '7571097', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '282'],
            ['ar_name' => 'حى العيون', 'district_code' => '18', 'code' => '3', 'municipality_branche_code' => '6', 'area' => '7907777', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '283'],
            ['ar_name' => 'حى الأصيفرين', 'district_code' => '9', 'code' => '2', 'municipality_branche_code' => '5', 'area' => '1126025', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '284'],
            ['ar_name' => 'حى عروة', 'district_code' => '16', 'code' => '2', 'municipality_branche_code' => '5', 'area' => '3583657', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '285'],
            ['ar_name' => 'حى الجماوات', 'district_code' => '16', 'code' => '3', 'municipality_branche_code' => '5', 'area' => '6779377', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '286'],
            ['ar_name' => 'حى ذو الحليفة', 'district_code' => '16', 'code' => '4', 'municipality_branche_code' => '5', 'area' => '6248407', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '287'],
            ['ar_name' => 'حى جماء أم خالد', 'district_code' => '16', 'code' => '5', 'municipality_branche_code' => '5', 'area' => '9426784', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '288'],
            ['ar_name' => 'حى القبلتين', 'district_code' => '17', 'code' => '1', 'municipality_branche_code' => '5', 'area' => '2106312', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '289'],
            ['ar_name' => 'حى الجامعة', 'district_code' => '17', 'code' => '2', 'municipality_branche_code' => '5', 'area' => '5660874', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '290'],
            ['ar_name' => 'حى أبوكبير', 'district_code' => '21', 'code' => '1', 'municipality_branche_code' => '5', 'area' => '10326157', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '291'],
            ['ar_name' => 'حى الحساء', 'district_code' => '21', 'code' => '2', 'municipality_branche_code' => '5', 'area' => '4210213', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '292'],
            ['ar_name' => 'حى ورقان', 'district_code' => '21', 'code' => '3', 'municipality_branche_code' => '5', 'area' => '5836333', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '293'],
            ['ar_name' => 'حى الراية', 'district_code' => '10', 'code' => '2', 'municipality_branche_code' => '6', 'area' => '1652254', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '294'],
            ['ar_name' => 'حي الصادقية', 'district_code' => '24', 'code' => '3', 'municipality_branche_code' => '6', 'area' => '5964865', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '295'],
            ['ar_name' => 'حى السلام', 'district_code' => '22', 'code' => '1', 'municipality_branche_code' => '7', 'area' => '23460421', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '296'],
            ['ar_name' => 'حى الفتح', 'district_code' => '10', 'code' => '1', 'municipality_branche_code' => '6', 'area' => '2010331', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '297'],
            ['ar_name' => 'حى جشم', 'district_code' => '13', 'code' => '1', 'municipality_branche_code' => '4', 'area' => '7198914', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '302'],
            ['ar_name' => 'حى العنابس', 'district_code' => '26', 'code' => '2', 'municipality_branche_code' => '5', 'area' => '1180743', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '298'],
            ['ar_name' => 'حى بئر عثمان', 'district_code' => '18', 'code' => '1', 'municipality_branche_code' => '6', 'area' => '2414336', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '299'],
            ['ar_name' => 'حى وادي مذينب', 'district_code' => '13', 'code' => '2', 'municipality_branche_code' => '4', 'area' => '8002077', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '303'],
            ['ar_name' => 'حى السيح', 'district_code' => '26', 'code' => '1', 'municipality_branche_code' => '5', 'area' => '698918', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '300'],
            ['ar_name' => 'حى الملك فهد', 'district_code' => '12', 'code' => '4', 'municipality_branche_code' => '4', 'area' => '11292447', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '301'],
            ['ar_name' => 'حى الهدراء', 'district_code' => '13', 'code' => '4', 'municipality_branche_code' => '4', 'area' => '7856293', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '304'],
            ['ar_name' => 'حى الزهرة', 'district_code' => '23', 'code' => '2', 'municipality_branche_code' => '6', 'area' => '5686757', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '307'],
            ['ar_name' => 'حى السكب', 'district_code' => '20', 'code' => '4', 'municipality_branche_code' => '2', 'area' => '12044563', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '311'],
            ['ar_name' => 'حى شوران', 'district_code' => '15', 'code' => '3', 'municipality_branche_code' => '2', 'area' => '7550686', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '312'],
            ['ar_name' => 'حى عين الخيف', 'district_code' => '13', 'code' => '3', 'municipality_branche_code' => '4', 'area' => '4875595', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '305'],
            ['ar_name' => 'حى سكة الحديد', 'district_code' => '22', 'code' => '4', 'municipality_branche_code' => '7', 'area' => '11419578', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '306'],
            ['ar_name' => 'حي وادي البطان', 'district_code' => '180', 'code' => '2', 'municipality_branche_code' => '11', 'area' => '141349196', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '313'],
            ['ar_name' => 'حى حضوضاء', 'district_code' => '25', 'code' => '3', 'municipality_branche_code' => '4', 'area' => '531554481', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '315'],
            ['ar_name' => 'حي ام السيوف', 'district_code' => '29', 'code' => '2', 'municipality_branche_code' => '2', 'area' => '297846213', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '316'],
            ['ar_name' => 'حي كتانة', 'district_code' => '23', 'code' => '4', 'municipality_branche_code' => '6', 'area' => '6315994', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '308'],
            ['ar_name' => 'حى الدفاع', 'district_code' => '22', 'code' => '2', 'municipality_branche_code' => '7', 'area' => '16458223', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '309'],
            ['ar_name' => 'المدينة الصناعية', 'district_code' => '21', 'code' => '6', 'municipality_branche_code' => '5', 'area' => '136740549', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '317'],
            ['ar_name' => 'حى المفرحات', 'district_code' => '21', 'code' => '5', 'municipality_branche_code' => '5', 'area' => '60381511', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '318'],
            ['ar_name' => 'حي ابومرخة', 'district_code' => '28', 'code' => '1', 'municipality_branche_code' => '7', 'area' => '222555080', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '319'],
            ['ar_name' => 'حى الصهلوج', 'district_code' => '28', 'code' => '2', 'municipality_branche_code' => '7', 'area' => '170311585', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '320'],
            ['ar_name' => 'حى العزيزية', 'district_code' => '22', 'code' => '3', 'municipality_branche_code' => '7', 'area' => '14546329', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '310'],
            ['ar_name' => 'حى ابو سدر', 'district_code' => '56', 'code' => '2', 'municipality_branche_code' => '11', 'area' => '99544085', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '314'],
            ['ar_name' => 'حى البلقاء', 'district_code' => '28', 'code' => '3', 'municipality_branche_code' => '7', 'area' => '18977946', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '321'],
            ['ar_name' => 'حي طيبة', 'district_code' => '22', 'code' => '5', 'municipality_branche_code' => '7', 'area' => '33784365', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '322'],
            ['ar_name' => 'حي الحفيا', 'district_code' => '23', 'code' => '5', 'municipality_branche_code' => '6', 'area' => '21604099', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '323'],
            ['ar_name' => 'حى النخيل', 'district_code' => '23', 'code' => '1', 'municipality_branche_code' => '6', 'area' => '8597154', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '324'],
            ['ar_name' => 'حى سد الغابة', 'district_code' => '45', 'code' => '1', 'municipality_branche_code' => '3', 'area' => '300666222', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '325'],
            ['ar_name' => 'حي وادي الحمض', 'district_code' => '24', 'code' => '2', 'municipality_branche_code' => '6', 'area' => '117581444', 'population' => '1', 'buliding_hight' => '0', 'mi_prinx' => '326'],
            ['ar_name' => 'ابيار الماشي', 'district_code' => '51', 'code' => '1', 'municipality_branche_code' => '14', 'area' => '2237184070', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '329'],
            ['ar_name' => 'المليليح', 'district_code' => '52', 'code' => '3', 'municipality_branche_code' => '12', 'area' => '2111572515', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '330'],
            ['ar_name' => 'المندسة', 'district_code' => '55', 'code' => '1', 'municipality_branche_code' => '13', 'area' => '1132136135', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '331'],
            ['ar_name' => 'الفريش', 'district_code' => '47', 'code' => '1', 'municipality_branche_code' => '15', 'area' => '1749881844', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '332'],
            ['ar_name' => 'الصويدرة', 'district_code' => '53', 'code' => '1', 'municipality_branche_code' => '9', 'area' => '4372254158', 'population' => '0', 'buliding_hight' => '0', 'mi_prinx' => '333'],
        ];


        if (Neighbor::all()->count() >= count($all_neighbors)) {
            return false;
        }

        $aad_user_id = auth()->user()->id;
        $add_user_name = auth()->user()->user_name;
        $all_municipality_branchs = MunicipalityBranch::all();
        $all_districts = District::all();

        foreach ($all_neighbors as $neighbor) {

            $new_neighbor = new Neighbor();

            $new_neighbor->aad_user_id = $aad_user_id;
            $new_neighbor->add_user_name = $add_user_name;
            // -------------
            $municipality_branche_id = '';
            $municipality_branche_ar_name = '';
            $municipality_branche_en_name = '';
            // -------------
            $district_id = '';
            $district_ar_name = '';
            $district_en_name = '';

            foreach ($all_municipality_branchs as $municipality_branch) {
                if ($municipality_branch['code']) {
                    if ($municipality_branch['code'] == $neighbor['municipality_branche_code']) {

                        $municipality_branche_id = $municipality_branch['id'];
                        $municipality_branche_ar_name = $municipality_branch['ar_name'];
                        $municipality_branche_en_name = $municipality_branch['en_name'];
                    }
                }
            }
            foreach ($all_districts as $district) {
                if ($district['code']) {
                    if ($district['code'] == $neighbor['municipality_branche_code']) {

                        $district_id = $district['id'];
                        $district_ar_name = $district['ar_name'];
                        $district_en_name = $district['en_name'];
                    }
                }
            }

            $new_neighbor->municipality_branche_id = $municipality_branche_id;
            $new_neighbor->municipality_branche_ar_name = $municipality_branche_ar_name;
            $new_neighbor->municipality_branche_en_name = $municipality_branche_en_name;
            // -------------
            $new_neighbor->district_id = $district_id;
            $new_neighbor->district_ar_name = $district_ar_name;
            $new_neighbor->district_en_name = $district_en_name;

            foreach ($neighbor as $key => $value) {
                if ($value) {
                    $new_neighbor->$key =  $value;
                }
            }

            $new_neighbor->save();
        }
        return true;
    }
}
