<?php
namespace Core;
class Validator
{
    public static function string($value,$min=1,$max= INF)
    {
        if(strlen($value) >= $min && strlen($value) <= $max)
        {
            return true;
        }
        return false;
    }

    public static function email($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        return false;   
    }
}