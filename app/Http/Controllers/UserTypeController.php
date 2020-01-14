<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
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
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $userType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit(UserType $userType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserType $userType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserType $userType)
    {
        //
    }

    public static function firstInsertion()
    {
        $created_by_id = auth()->user()->id;
        $created_by_name = auth()->user()->name;
        $user_types = array(
            [
                'type' => 'system_admin',
                'description' => 'full control on the app',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'it_user',
                'description' => 'full control on the app',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'owner',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'office_manager',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'manager',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'department_manager',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'project_manager',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'administrative',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'architecture',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'engineer',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'designer',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'draftsman',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ],
            [
                'type' => 'stander',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ], // 
            [
                'type' => 'stander',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ], // جديد
            [
                'type' => 'temporary',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ], // مؤقت
            [
                'type' => 'in_vacation',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ], // في إجازة
            [
                'type' => 'suspended',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ], // موقوف
            [
                'type' => 'retired',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ], // متقاعد
            [
                'type' => 'resigned',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ], // ترك العمل
            [
                'type' => 'dismissed',
                'description' => '',
                'created_by_id' => $created_by_id,
                'created_by_name' => $created_by_name,
            ], // مفصول
        );
        if (UserType::all()->count() >= count($user_types)) {
            return false;
        }
        // -------------------------------------
        foreach ($user_types as $user_type) {
            $new_type = new UserType();
            $new_type->create($user_type);
        }
        return true;
    }
}
