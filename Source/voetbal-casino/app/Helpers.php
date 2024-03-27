<?php

namespace App;

class Helper
{
    public static function is_valid_url($url)
    {
        $headers = get_headers($url);
        return stripos($headers[0], "200 OK") !== false;
    }
}