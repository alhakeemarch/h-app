<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class DateAndTime extends Controller
{
    public static function get_date_time_arr($date = null)
    {

        // $x = new DateTime('11.4.1987');
        // dd(date('d-m-yy', strtotime($x)));
        //date in mm/dd/yyyy format; or it can be in other formats as well
        // $birthDate = "25/08/1983";
        //explode the date to get month, day and year
        // $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        // return date("md");
        // return (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))));
        // $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        //     ? ((date("Y") - $birthDate[2]) - 1)
        //     : (date("Y") - $birthDate[2]));
        // return "Age is:" . $age;

        // $date = ($date) ? $a : strtotime(now());

        $gregorian_date_ar = date("yy-m-d", strtotime(now()));
        $gregorian_date_en = date("d-m-yy", strtotime(now()));
        $day_of_week_en = date("l", strtotime(now()));
        // $day_of_week_en = date("l", strtotime('2020-09-20'));
        // ----------------------------------------------------------
        $arabic_week_days = [
            'Sunday' => 'الأحد',
            'Monday' => 'الإثنين',
            'Tuesday' => 'الثلاثاء',
            'Wednesday' => 'الأربعاء',
            'Thursday' => 'الخميس',
            'Friday' => 'الجمعة',
            'Saturday' => 'السبت',
        ];

        $day_of_week_ar = null;
        foreach ($arabic_week_days as $en_day => $ar_day) {
            if ($en_day == $day_of_week_en)
                $day_of_week_ar = $ar_day;
        }
        // ----------------------------------------------------------
        $h = new \App\HijriDate();
        $hijri_date_en = $h->get_date($gregorian_date_en);
        $hijri_date_ar = self::reverse_date($hijri_date_en);


        // ----------------------------------------------------------
        $date_and_time = [];
        $date_and_time['g_date_ar'] = $gregorian_date_ar;
        $date_and_time['g_date_en'] = $gregorian_date_en;
        $date_and_time['day_en'] = $day_of_week_en;
        $date_and_time['day_ar'] = $day_of_week_ar;
        $date_and_time['h_date_en'] = $hijri_date_en;
        $date_and_time['h_date_ar'] = $hijri_date_ar;

        return $date_and_time;
    }
    // -----------------------------------------------------------------------------------------------------------------
    public static function reverse_date($date)
    {
        $h_date_arr = explode("-", $date);
        $hijri_todate_day_no = $h_date_arr[0];
        $hijri_todate_monthe_no = $h_date_arr[1];
        $hijri_todate_year_no = $h_date_arr[2];
        return $hijri_todate_year_no . '-' . $hijri_todate_monthe_no . '-' . $hijri_todate_day_no;
    }
}
