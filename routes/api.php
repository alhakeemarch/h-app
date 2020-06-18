<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// http://localhost/h-app/public/api/me
Route::get('get_main_types', function () {
    $main_types = [
        'all' => 'All - كامل المشروع',
        'doc' => 'Scanned Document -مستند سكانر',
        'img' => 'image - صورة',
        'row' => 'Row Document - مستند خام',
        'concept' => 'Concept - فكرة',
        'preliminary' => 'preliminary - ابتدائي',
        'ARC' => 'ARC - معماري',
        'STR' => 'STR - إنشائي',
        'Elec' => 'Elec - كهرباء',
        'DR' => 'DR - صرف',
        'WS' => 'WS - تغذية',
        'HVAC' => 'HVAC - تكيف',
        'FF' => 'FF - اطفاء',
        'FA' => 'FA - انذار',
        'evacuation' => 'evacuation - اخلاء',
        'tourism' => 'tourism - سياحة',
        'Elec-Paper' => 'Elec-Paper- ورقة الكهرباء',
        'survey' => 'survey - مساحة'
    ];
    return $main_types;
});
