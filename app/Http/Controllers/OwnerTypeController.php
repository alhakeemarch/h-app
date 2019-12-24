<?php

namespace App\Http\Controllers;

use App\OwnerType;
use Illuminate\Http\Request;

class OwnerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ownerTypes = OwnerType::all();
        return view('ownerType.index')->with('ownerTypes', $ownerTypes);
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
     * @param  \App\OwnerType  $ownerType
     * @return \Illuminate\Http\Response
     */
    public function show(OwnerType $ownerType)
    {
        return view('ownerType.show')->with('ownerType', $ownerType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OwnerType  $ownerType
     * @return \Illuminate\Http\Response
     */
    public function edit(OwnerType $ownerType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OwnerType  $ownerType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OwnerType $ownerType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OwnerType  $ownerType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OwnerType $ownerType)
    {
        //
    }

    /**
     * insert inital allowed usage data to db.
     */
    public static function firstInsertion()
    {
        $ownerTypes = [
            'person' => 'شخص',
            'partners' => 'شركاء',
            'inheritor' => 'ورثة',
            'company' => 'شركة',
            'institution' => 'مؤسسة',
            'endowment' => 'وقف',
            'governmental organizations' => 'جهة حكومية',
            'organizations' => 'جهة',
            'ministry of endowments' => 'وزارة الأوقاف',
        ];

        if (OwnerType::all()->count() >= count($ownerTypes)) {
            return false;
        }
        foreach ($ownerTypes as $key => $value) {
            $ownerType = new OwnerType();
            $ownerType->type_en = $key;
            $ownerType->type_ar = $value;
            $ownerType->save();
        }
        return true;
    }
}
