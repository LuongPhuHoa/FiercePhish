<?php

namespace App\Libraries;

use Carbon\Carbon;

class DateHelper
{
    public static function printable($date)
    {
        if (self::isNull($date)) {
            return 'N/A';
        }
        
        return $date->timezone(config('fiercephish.APP_TIMEZONE'))->toDateTimeString();
    }
    
    public static function readable($date)
    {
        if (self::isNull($date)) {
            return 'N/A';
        }
        
        return $date->timezone(config('fiercephish.APP_TIMEZONE'))->format('M j, Y @ g:i:s a');
    }
    
    public static function relative($date)
    {
        if (self::isNull($date)) {
            return 'N/A';
        }
        
        return $date->timezone(config('fiercephish.APP_TIMEZONE'))->diffForHumans();
    }
    
    public static function format($date, $format)
    {
        if (self::isNull($date)) {
            return 'N/A';
        }
        
        return $date->timezone(config('fiercephish.APP_TIMEZONE'))->format($format);
    }
    
    public static function isNull($date)
    {
        return $date === null || property_exists($date, 'year') || $date->year < 5;
    }
    
    public static function getOffset($tz = '')
    {
        if ($tz === '') {
            $tz = config('fiercephish.APP_TIMEZONE');
        }
        $target_time_zone = new \DateTimeZone($tz);
        $date_time = new \DateTime('now', $target_time_zone);
        
        return $date_time->format('P');
    }
    
    public static function now()
    {
        return Carbon::now()->timezone(config('fiercephish.APP_TIMEZONE'));
    }
    
    public static function convert($date)
    {
        return $date->timezone(config('fiercephish.APP_TIMEZONE'));
    }
}
