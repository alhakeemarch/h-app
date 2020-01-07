<?php

use Faker\Generator as Faker;


function get_random_user()
{
    $users = App\User::all();
    $random_id = rand(1, $users->count());
    return App\User::where('id', $random_id)->first();
}

$factory->define(App\Plot::class, function (Faker $faker) {


    $user = get_random_user();

    return [

        'created_by_id' => $user->id,
        'created_by_name' => $user->user_name,
        'last_edit_user_id' => null,
        'last_edit_user_name' => null,
        'deed_no' => function () {
            return rand(11111111, 99999999);
        },
        'deed_date' => now(),
        'plot_no' => function () {
            return rand(12, 386);
        },

        'area' => function () {
            return rand(600, 900);
        },
        'district' => function () {
            $districts = App\Http\Controllers\PlotController::getDistricts();
            $rand_key = array_rand($districts);
            return $districts[$rand_key];
        },
        'road_code' => function () {
            return rand(1234, 4321);
        },
        'road_name' => 'إسم شارع',  // need a fix
        'plan_no' => '8', // need a fix
        // 'municipality_branch' => function () {
        //     $municipality_branchs = App\Http\Controllers\PlotController::get_municipality_branches();
        //     $rand_key = array_rand($municipality_branchs);
        //     return $municipality_branchs[$rand_key];
        // },
        'municipality_branch_name' => 'بلدية فرعية',
        'municipality_branch_id' => '66',
        'notes' => 'some notes about the plot'
    ];
});
