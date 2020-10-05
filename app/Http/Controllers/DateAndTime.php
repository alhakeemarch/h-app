<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateAndTime extends Controller
{
    public static function get_date_time_arr($date = null)
    {
        $date = ($date) ? $date : now();
        $gregorian_date_ar = date("yy-m-d", strtotime($date));
        $gregorian_date_en = date("d-m-yy", strtotime($date));
        $day_of_week_en = date("l", strtotime($date));
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
