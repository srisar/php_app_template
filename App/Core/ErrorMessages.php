<?php


namespace App\Core;


class ErrorMessages
{


    /**
     * Add a new error message.
     *
     * @param $key
     * @param $value
     */
    public static function push($key, $value)
    {
        $_SESSION['_MESSAGES']['_ERRORS'][$key] = $value;
    }

    /**
     * Check if the error message is present by checking
     * if the error message key exist.
     *
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        if ( array_key_exists($key, $_SESSION['_MESSAGES']['_ERRORS']) ) {
            return true;
        }
        return false;
    }

    /**
     * Gets the error message. Once fetched, it will be removed from the
     * message array.
     *
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        $data = $_SESSION['_MESSAGES']['_ERRORS'][$key];
        unset($_SESSION['_MESSAGES']['_ERRORS'][$key]);
        return $data;
    }

}