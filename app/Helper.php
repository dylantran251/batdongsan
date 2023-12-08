<?php

namespace App;

use Carbon\Carbon;
use PharIo\Manifest\License;

class Helper
{
    public static function formatCode($code)
    {
        return str_replace('>', 'HTMLCloseTag', str_replace('<', 'HTMLOpenTag', $code));
    }

    public static function formatStringVNDAmount($amount): string
    {
        $str = '';
        $num  = trim($amount);

        $arr = str_split($num);
        $count = count( $arr );

        $f = number_format($num);
        if ( $count < 7 ) {
            $str = $num;
        } else {
            $r = explode(',', $f);
            switch ( count ( $r ) ) {
                case 4:
                    $str = $r[0] . ' Tỷ';
                    if ( (int) $r[1] ) { $str .= ' '. $r[1] . ''; }
                    break;
                case 3:
                    $str = $r[0] . ' Triệu';
                    if ( (int) $r[1] ) { $str .= ' '. $r[1] . 'k'; }
                    break;
            }
        }
        return ( $str);
    }

    public static function formatCurrencyVND($number){
        $numberLength = strlen($number);
        if($numberLength >= 10 && $number/1000000000 >= 1){
            return round($number/1000000000, 2). ' tỷ';
        }elseif($numberLength < 10 && $numberLength >6 && $number/1000000 >= 1){
            return round($number/1000000, 1). ' triệu';
        }elseif($numberLength < 7 && $numberLength>3 && $number/1000 > 1){
            return round($number/1000, 0). ' nghìn';
        }
        return 'Thỏa thuận';
    }

    public static function dateDifference($created_at){
        $now = Carbon::now();
        if($created_at === null){
            $created_at = Carbon::now();
        }
        $dateToCompare = $created_at->format('Y-m-d');
        $diffInDays = $now->diffInDays($dateToCompare);
        if ($diffInDays == 0) {
            return 'hôm nay';
        } elseif ($diffInDays == 1) {
            return 'hôm qua';
        } else {
            if ($diffInDays >= 30) {
                // Nếu số ngày lớn hơn hoặc bằng 30, tính số tháng
                $diffInMonths = $now->diffInMonths($dateToCompare);
                if ($diffInMonths >= 12) {
                    // Nếu số tháng lớn hơn hoặc bằng 12, tính số năm
                    $diffInYears = floor($diffInMonths / 12);
                    return $diffInYears . ' năm' . ' trước';
                } else {
                    return $diffInMonths . ' tháng' . ' trước';
                }
            } else {
                return $diffInDays . ' ngày' . ' trước';
            }
        }
    }
}
