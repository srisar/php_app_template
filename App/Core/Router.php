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

    public static function post(string $path, string $controller)
    {
        self::$postList[$path] = $controller;
    }


    /**
     * Execute the correct route for given path
     * @param $path - Current URL path
     */
    public static function route(string $path)
    {


        if ( Request::method() == Request::REQUEST_GET ) {
            self::doRoute($path, self::$getList);
        } elseif ( Request::method() == Request::REQUEST_POST ) {
            self::doRoute($path, self::$postList);
        }

    }


    private static function doRoute(string $path, array $routeList)
    {
        if ( array_key_exists($path, $routeList) ) {

            $controllerData = explode("@", $routeList[$path]);

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

            (new CommonController())->show404();
            return;

        }
    }

}