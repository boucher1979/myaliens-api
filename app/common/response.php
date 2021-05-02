<?php

class Response
{
    static function Error($_message)
    {
        http_response_code(500);
        self::Send($_message, 'application/html');
    }

    static function Send($_data, $_type)
    {
        header('Content-Type: ' . $_type);
        echo $_data;
    }

    static function SendJson($_data)
    {
        self::Send(json_encode($_data), 'application/json');
    }
}

?>