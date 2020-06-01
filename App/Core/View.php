<?php


namespace App\Core;


class View
{

    private static array $data = [];

    /**
     * Includes the template file from views folder
     * @param $template - if file is in views/pages/index.view.php,
     * just use 'index.view' as template name
     */
    public static function render($template)
    {
        require_once(BASE_PATH . "/views/" . $template . ".php");
    }


}