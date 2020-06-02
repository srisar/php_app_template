<?php


namespace App\Core;


class View
{

    private static array $data = [];

    /**
     * Includes the template file from views folder
     * @param $template - if file is in views/pages/index.view.php,
     * just use 'pages/index.view' as template name
     */
    public static function render($template)
    {
        require_once(BASE_PATH . "/views/" . $template . ".php");
    }


    public static function setData($key, $value)
    {
        self::$data[$key] = $value;
    }

    public static function getData($key)
    {
        if ( isset(self::$data[$key]) ) {
            return self::$data[$key];
        }
        return null;
    }


}