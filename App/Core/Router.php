<?php


namespace App\Core;


use App\Controllers\CommonController;

class Router
{

    private static array $getList = [];
    private static array $postList = [];

    /**
     * @param string $path
     * @param string $controller - "Controller@method"
     */
    public static function get(string $path, string $controller)
    {
        self::$getList[$path] = $controller;
    }


    /**
     * Execute the correct route for given path
     * @param $path - Current URL path
     */
    public static function route(string $path)
    {


        if ( Request::method() == Request::REQUEST_GET ) {

            if ( array_key_exists($path, self::$getList) ) {

                $controllerData = explode("@", self::$getList[$path]);

                $controller = $controllerData[0];
                $method = $controllerData[1];

                $controllerClass = "App\\Controllers\\" . $controller;

                $c = new $controllerClass();

                echo call_user_func([$c, $method]);
                return;
            } else {

                /**
                 * route doesnt exist for the path given.
                 * display 404 page
                 */

                echo (new CommonController())->show404();
                return;

            }

        }

    }

}