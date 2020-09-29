<?php

namespace App\Http\Controllers;

use App\ContractType;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
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
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function show(ContractType $contractType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractType $contractType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractType $contractType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractType $contractType)
    {
        //
    }
    public static function firstInsertion()
    {
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->name;
        $contract_types = array(
            [
                'name_ar' => 'عقد تصميم',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد قرار مساحي',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد محضر تثبيت',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد اشراف عظم',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد اشراف كامل',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تصميم واجهة ثلاثية الابعاد',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تصميم سلامة',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تصميم سلامة مدن',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد اشراف سلامة',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد اشراف سلامة مدن',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تعديل تصميم',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد نقل ملكية',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تجديد رخصة',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'ملحق عقد تصميم ورخصة',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'ملحق عقد',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد فرز وحدات',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد فرز ارض',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد دمج ارض',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد رفع مساحي',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تثبيت اكسات',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تثبيت مخصص',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تخطيط ارض',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تصميم لانسكيب',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تصميم ديكور',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تصميم ديكور ثلاثي الابعاد',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تصميم ديكور ثلاثي الابعاد',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد تعديل',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد اشراف زيارات',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد اشراف مراقب مقيم',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد اشراف مهندس مقيم',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'name_ar' => 'عقد اشراف فريق مقيم',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],

        );
        if (ContractType::all()->count() >= count($contract_types)) {
            return false;
        }
        // -------------------------------------
        foreach ($contract_types as $contract_type) {
            $new_type = new ContractType();
            $new_type->create($contract_type);
        }
        return true;
    }
}
