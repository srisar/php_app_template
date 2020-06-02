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

    /*
     * ---------------------------------------------------------------------------------------
     * | Request parameters from GET/POST
     * ---------------------------------------------------------------------------------------
     */
    /**
     * @param string $key
     * @return string
     */
    private static function getParam(string $key): ?string
    {
        if ( isset($_REQUEST[$key]) ) {
            return $_REQUEST[$key];
        }
        return null;
    }

    /**
     * Returns request parameter value as integer
     * @param string $key
     * @return int|null
     */
    public static function getAsInteger(string $key): ?int
    {
        $data = self::getParam($key);

        if ( !is_null($data) ) {
            if ( filter_var($data, FILTER_VALIDATE_INT) ) {
                return (int)$data;
            }
        }
        return null;
    }

    /**
     * Returns request parameter value as float
     * @param string $key
     * @return float|null
     */
    public static function getAsFloat(string $key): ?float
    {
        $data = self::getParam($key);
        if ( !is_null($data) ) {
            if ( filter_var($data, FILTER_VALIDATE_FLOAT) ) {
                return (float)$data;
            }
        }
        return null;
    }

    /**
     * Returns request parameter value as string
     * @param string $key
     * @return string|null
     */
    public static function getAsString(string $key): ?string
    {
        $data = self::getParam($key);
        if ( !is_null($data) ) {
            return filter_var($data, FILTER_SANITIZE_STRING);
        }
        return null;
    }

}