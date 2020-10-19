<?php

namespace App\Http\Controllers;

use App\ContractType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractTypeController extends Controller
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('active_user');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract_types = ContractType::all();
        return view('contractType.index')->with(['contract_types' => $contract_types]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ContractType $contractType)
    {
        return view('contractType.create')->with(['contractType' => $contractType]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate_contractType($request);
        $validatedData['created_by_id'] = auth()->user()->id;
        $validatedData['created_by_name'] = auth()->user()->user_name;
        $contract_type = ContractType::create($validatedData);
        $contract_type->save();
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'contract_types',
            'model' => 'ContractType',
            'model_id' => $contract_type->id,
            'action' => 'create',
            'description' => 'contract_type wite id =>'  . $contract_type->id  . ', created',
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->route('contractType.index');
    }

    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function show(ContractType $contractType)
    {
        return view('contractType.show')->with(['contractType' => $contractType]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractType $contractType)
    {
        return view('contractType.edit')->with(['contractType' => $contractType]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractType $contractType)
    {
        $old_record = $this->get_record_as_str($contractType);
        $validatedData = $this->validate_contractType($request);
        $validatedData['last_edit_by_id'] = auth()->user()->id;
        $validatedData['last_edit_by_name'] = auth()->user()->user_name;
        $contractType->update($validatedData);
        $new_record = $this->get_record_as_str($contractType);
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'contract_types',
            'model' => 'ContractType',
            'model_id' => $contractType->id,
            'action' => 'update',
            'notes' => 'a record was ::>' . $old_record . ', and become::>' . $new_record,
            'description' => 'contract_type wite id =>'  . $contractType->id  . ', updated',
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->route('contractType.index')->with('success', 'contract type updated successfully - تم تعديل نوع العقد بنجاح');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractType $contractType)
    {
        $record = $this->get_record_as_str($contractType);
        $contractType->delete();
        // -----------------------------------------------------------------
        // add record to db_log
        $db_record_data = [
            'table' => 'contract_types',
            'model' => 'ContractType',
            'model_id' => $contractType->id,
            'action' => 'Delete',
            'notes' => 'Delete a record ::' . $record,
            'description' => 'contract_type wite id =>'  . $contractType->id  . ', deletet',
        ];
        DbLogController::add_record($db_record_data);
        // -----------------------------------------------------------------
        return redirect()->route('contractType.index')->with('success', 'contract type deleted successfully - تم حذف نوع العقد بنجاح');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function validate_contractType($request)
    {
        return $request->validate([
            'name_ar' => 'required|string|min:2',
            'name_en' => 'nullable|string',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'private_notes' => 'nullable|string',
        ]);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_record_as_str($contractType)
    {
        $record = '';
        $obj = json_decode($contractType, TRUE);
        foreach ($obj as $a => $b) {
            $record = $record . ' | ' . $a . '=>' . $b;
        }
        return $record;
    }
    // -----------------------------------------------------------------------------------------------------------------
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
