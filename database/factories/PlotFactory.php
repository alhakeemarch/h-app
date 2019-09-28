<?php

use Faker\Generator as Faker;

$factory->define(App\Plot::class, function (Faker $faker) {
    return [

        'deed_no' => '',
        'deed_date' => '',
        'plot_no' => '',
        'plan_name' => '',
        'area' => '',
        'district' => '',
        'road_code' => '',
        'road_name' => ''
    ];
});
