<?php

namespace Core;

class Validator {

    public static function string($string, $min=1, $max=INF)
    {
        if (strlen($string)<$min || strlen($string)>$max) {
            return false;
        }

        return true;
    }

    public static function email($email)
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public static function image($type, $alloweds= [ IMAGETYPE_JPEG, IMAGETYPE_PNG ])
    {
        foreach($alloweds as $allowed) {
            if ($type == $allowed) {
                return true;
            }
        }

        return false;
    }

    public static function int($int, $min=10 , $max=10485760)
    {
        if ($int<$min || $int>$max) {
            return false;
        }

        return true;
    }
}