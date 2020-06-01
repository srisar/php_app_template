<?php


namespace App\Core;


class Request
{

    public const REQUEST_GET = 'GET';
    public const REQUEST_POST = 'POST';

    /**
     * Returns the request method: GET, POST, PUT, DELETE and so on..
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function scheme()
    {
        return $_SERVER['REQUEST_SCHEME'];
    }

    public static function host()
    {
        return $_SERVER['HTTP_HOST'];
    }


    public static function getParam(string $key)
    {
        if ( isset($_REQUEST[$key]) ) {
            return $_REQUEST[$key];
        }
        return null;
    }

}