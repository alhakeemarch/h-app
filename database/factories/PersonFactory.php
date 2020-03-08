<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [

        'national_id' => function () {
            $test = false;
            while (!$test) {
                // because rand function  accepts  just 9 digits
                $first_9_digits = rand(100000000, 299999999);
                $last_digit = rand(1, 9);
                $new_national_id = $first_9_digits . $last_digit;
                $all_id = Person::all()->pluck('national_id')->toArray();
                if (!(in_array($new_national_id, $all_id))) {
                    $test = true;
                    return $new_national_id;
                }
            }
        },


        'is_employee' => function () {
            return rand(0, 1);
        },
        'is_customer' => function () {
            return rand(0, 1);
        },

        'ar_name1' => $faker->firstName,
        'ar_name2' => $faker->firstName,
        'ar_name3' => $faker->firstName,
        'ar_name4' => $faker->firstName,
        'ar_name5' => $faker->firstName,
        'en_name1' => $faker->firstName,
        'en_name2' => $faker->firstName,
        'en_name3' => $faker->firstName,
        'en_name4' => $faker->firstName,
        'en_name5' => $faker->firstName,

        'mobile' => $faker->phoneNumber,
        'phone' => $faker->phoneNumber,
        'phone_extension' => '102',
        'email' => $faker->unique()->safeEmail,

        'nationality_code' => function () {
            return ((rand(0, 10)) >= 5) ? '3' : '8';
        },
        'nationality_ar' => function () {
            return ((rand(0, 10)) >= 5) ? 'سعودي' : 'مصري';
        },

        'nationality_en' => function () {
            return ((rand(0, 10)) >= 5) ? 'Saudi' : 'Egybit';
        },

        'hafizah_no' => '12345',
        'national_id_issue_date' => now(),
        'national_id_expire_date' => now(),
        'national_id_issue_place' => 'Madinah',

        'pasport_no' => 'nullable',
        'pasport_issue_date' => 'nullable',
        'pasport_id_expire_date' => 'nullable',
        'pasport_id_issue_place' => 'nullable',

        'ah_birth_date' => 'nullable',
        'ad_birth_date' => 'nullable',
        'birth_place' => 'nullable',
        'birth_city' => 'nullable',

        // $table->timestamps();

    ];
});
