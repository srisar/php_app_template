<?php


namespace App\Core\Messages;


class SessionForm
{
    private const FLASH_KEY = "_FORM";

    public static function push($key, $value)
    {
        FlashMessage::$flashKey = self::FLASH_KEY;
        FlashMessage::push($key, $value);
    }

    public static function get($key)
    {
        FlashMessage::$flashKey = self::FLASH_KEY;
        return FlashMessage::get($key);
    }

    public static function has($key)
    {
        FlashMessage::$flashKey = self::FLASH_KEY;
        return FlashMessage::has($key);
    }
}