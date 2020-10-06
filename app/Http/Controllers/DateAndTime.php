<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class DateAndTime extends Controller
{
    public static function get_date_time_arr($date = null)
    {
        $date = ($date) ? strtotime($date) : strtotime(now());

        $gregorian_date_ar = date("Y-m-d", $date);
        $gregorian_date_en = date("d-m-Y", $date);
        $day_of_week_en = date("l", $date);
        $month_short_en = date("M", $date);
        $month_full_en = date("F", $date);
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
        $h = new \App\HijriDate($date);
        $hijri_date_en = $h->get_date();
        $hijri_date_ar = self::reverse_date($hijri_date_en);
        $hijri_day_no = $h->get_day();
        $hijri_month_no = $h->get_month();
        $hijri_year_no = $h->get_year();
        $hijri_month_name_en = $h->get_month_name($hijri_month_no);
        $hijri_month_name_ar = $h->get_month_name_ar($hijri_month_no);




        // ----------------------------------------------------------
        $date_and_time = [];
        $date_and_time['g_date_ar'] = $gregorian_date_ar;
        $date_and_time['g_date_en'] = $gregorian_date_en;
        $date_and_time['day_en'] = $day_of_week_en;
        $date_and_time['month_short_en'] = $month_short_en;
        $date_and_time['month_full_en'] = $month_full_en;

        $date_and_time['day_ar'] = $day_of_week_ar;
        $date_and_time['hijri_day_no'] = $hijri_day_no;
        $date_and_time['hijri_month_no'] = $hijri_month_no;
        $date_and_time['hijri_month_name_en'] = $hijri_month_name_en;
        $date_and_time['hijri_month_name_ar'] = $hijri_month_name_ar;
        $date_and_time['hijri_year_no'] = $hijri_year_no;
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
