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
        $g_day_no = date("d", $date);
        $month_short_en = date("M", $date);
        $g_year_no = date("Y", $date);
        $g_month_no = date("m", $date);
        $g_month_name_ar = self::get_ar_month_name($g_month_no);
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
        $date_and_time['g_day_no'] = $g_day_no;
        $date_and_time['g_year_no'] = $g_year_no;
        $date_and_time['month_short_en'] = $month_short_en;
        $date_and_time['month_full_en'] = $month_full_en;
        $date_and_time['g_month_name_ar'] = $g_month_name_ar;

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
    // -----------------------------------------------------------------------------------------------------------------
    private static function get_ar_month_name($en_month_no)
    {
        switch ($en_month_no) {
            case '1':
                return 'يناير';
                break;
            case '2':
                return 'فبراير';
                break;
            case '3':
                return 'مارس';
                break;
            case '4':
                return 'ابريل';
                break;
            case '5':
                return 'مايو';
                break;
            case '6':
                return 'يونيو';
                break;
            case '7':
                return 'يوليو';
                break;
            case '8':
                return 'اغسطس';
                break;
            case '9':
                return 'سبتمبر';
                break;
            case '10':
                return 'اكتوبر';
                break;
            case '11':
                return 'نوفمبر';
                break;
            case '12':
                return 'ديسمبر';
                break;

            default:
                return 'Error!';
                break;
        }
    }
}
