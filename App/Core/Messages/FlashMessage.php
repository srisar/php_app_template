<?php


namespace App\Core\Messages;


class FlashMessage
{


    public static ?string $flashKey;

    /**
     * Add a new error message.
     *
     * @param $key
     * @param $value
     */
    public static function push($key, $value)
    {
        $_SESSION['_MESSAGES'][self::$flashKey][$key] = $value;
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
        if ( isset($_SESSION['_MESSAGES'][self::$flashKey]) && array_key_exists($key, $_SESSION['_MESSAGES'][self::$flashKey]) ) {
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
        $data = $_SESSION['_MESSAGES'][self::$flashKey][$key];
        unset($_SESSION['_MESSAGES'][self::$flashKey][$key]);
        return $data;
    }

}