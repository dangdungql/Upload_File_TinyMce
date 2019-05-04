<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/13/2018
 * Time: 8:35 AM
 */

namespace app\modules\contrib;


class FormatUtil
{
    public static function asDateString($date, $format='d/m/Y') {
        return isset($date) ? $date->format($format) : '';
    }
}