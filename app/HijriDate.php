<?php

namespace App;


class HijriDate
{
    private $hijri;
    public function __construct($time = false)
    {
        if (!$time) $time = time();
        $this->hijri = $this->GregorianToHijri($time);
    }
    public function get_date()
    {
        // =========================================
        switch ($this->hijri[0]) {
            case 1:
                $this->hijri[0] = '01';
                break;
            case 2:
                $this->hijri[0] = '02';
                break;
            case 3:
                $this->hijri[0] = '03';
                break;
            case 4:
                $this->hijri[0] = '04';
                break;
            case 5:
                $this->hijri[0] = '05';
                break;
            case 6:
                $this->hijri[0] = '06';
                break;
            case 7:
                $this->hijri[0] = '07';
                break;
            case 8:
                $this->hijri[0] = '08';
                break;
            case 9:
                $this->hijri[0] = '09';
                break;
            default:
                # code...
                break;
        }
        // -----------------------------------------
        switch ($this->hijri[1]) {
            case 1:
                $this->hijri[1] = '01';
                break;
            case 2:
                $this->hijri[1] = '02';
                break;
            case 3:
                $this->hijri[1] = '03';
                break;
            case 4:
                $this->hijri[1] = '04';
                break;
            case 5:
                $this->hijri[1] = '05';
                break;
            case 6:
                $this->hijri[1] = '06';
                break;
            case 7:
                $this->hijri[1] = '07';
                break;
            case 8:
                $this->hijri[1] = '08';
                break;
            case 9:
                $this->hijri[1] = '09';
                break;
            default:
                # code...
                break;
        }
        // =========================================
        // return $this->hijri;
        return $this->hijri[1] . '-' . $this->hijri[0] . '-' . $this->hijri[2];
        return $this->hijri[1] . ' ' . $this->get_month_name($this->hijri[0]) . ' ' . $this->hijri[2] . 'H';
    }
    public function get_day()
    {
        return $this->hijri[1];
    }
    public function get_month()
    {
        return $this->hijri[0];
    }
    public function get_year()
    {
        return $this->hijri[2];
    }

    public function get_month_name($i)
    {
        static $month = array(
            "muharram", "safar", "rabiulawal", "rabiulakhir",
            "jamadilawal", "jamadilakhir", "rejab", "syaaban",
            "ramadhan", "syawal", "zulkaedah", "zulhijjah"
        );
        return $month[$i - 1];
    }
    public function get_month_name_ar($i)
    {
        static $month = array(
            "محرم", "صفر", "ربيع الأول", "ربيع الآخر",
            "جمادالأول", "جماد الآخر", "رجب", "شعبان",
            "رمضان", "شوال", "ذي القعدة", "ذي الحجة"
        );
        return $month[$i - 1];
    }
    private function GregorianToHijri($time = null)
    {
        if ($time === null) $time = time();
        $m = date('m', $time);
        $d = date('d', $time);
        $y = date('Y', $time);
        return $this->JDToHijri(cal_to_jd(CAL_GREGORIAN, $m, $d, $y));
    }
    private function HijriToGregorian($m, $d, $y)
    {
        return jd_to_cal(CAL_GREGORIAN, $this->HijriToJD($m, $d, $y));
    }
    # Julian Day Count To Hijri
    private function JDToHijri($jd)
    {
        // =========================================
        // عدلت الرقم هذا عشان فرق يوم في التاريخ متأخر
        $jd = $jd - 1948440 + 10633;
        // هذا السطر الأصلي اللي حصلته في النت
        // $jd = $jd - 1948440 + 10632;
        // =========================================
        $n = (int) (($jd - 1) / 10631);
        $jd = $jd - 10631 * $n + 354;
        $j = ((int) ((10985 - $jd) / 5316)) *
            ((int) (50 * $jd / 17719)) +
            ((int) ($jd / 5670)) *
            ((int) (43 * $jd / 15238));
        $jd = $jd - ((int) ((30 - $j) / 15)) *
            ((int) ((17719 * $j) / 50)) -
            ((int) ($j / 16)) *
            ((int) ((15238 * $j) / 43)) + 29;
        $m = (int) (24 * $jd / 709);
        $d = $jd - (int) (709 * $m / 24);
        $y = 30 * $n + $j - 30;
        return array($m, $d, $y);
    }
    # Hijri To Julian Day Count
    private function HijriToJD($m, $d, $y)
    {
        return (int) ((11 * $y + 3) / 30) +
            354 * $y + 30 * $m -
            (int) (($m - 1) / 2) + $d + 1948440 - 385;
    }
    // public function (){
    //     return floor((11 * $year + 3) / 30) + floor(354 * $year) + floor(30 * $month)
    //         - floor(($month - 1) / 2) + $day + 1948440 - 386;
    // }
}
