<?php

namespace Morad\Myne;

use Throwable;

class Myne
{
    static function sendMailNow($to , $subject , $message)
    {
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . env('MAIL_FROM_ADDRESS') . "\r\n";
        $headers .= "Reply-To: ". env('MAIL_FROM_ADDRESS') . "\r\n";
        $headers .= "X-Mailer: PHP/8.2" ;
        mail($to, $subject, $message, $headers);
    }
    static function encode(array $array) : string
    {
        $result = '';
        try {
            $result = base64_encode(json_encode($array,JSON_INVALID_UTF8_IGNORE));
        } catch (Throwable $e) {}
        return $result;
    }
    static function decode(?string $string) : ?array
    {
        $result = [];
        try
        {
            $result = json_decode(base64_decode($string),true);
        } catch (Throwable $e) {}
        return $result;
    }
}
