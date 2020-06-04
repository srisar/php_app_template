<?php


namespace App\Core;


use App\Controllers\System\CommonController;
use App\Core\Requests\Request;
use App\Core\Sessions\AuthSession;
use App\Models\User;

class Router
{

    private static array $getList = [];
    private static array $postList = [];

    /**
     * Add routes to GET method handling
     *
     * @param string $path
     * @param string $controller - "Controller@method"
     * @param string $accessRole
     */
    public static function get(string $path, string $controller, string $accessRole = User::ROLE_NONE)
    {
        self::$getList[$path] = ['controller' => $controller, 'access' => $accessRole];
    }

    /**
     * Add routes to POST method handling
     *
     * @param string $path
     * @param string $controller
     * @param string $accessRole
     */
    public static function post(string $path, string $controller, string $accessRole = User::ROLE_NONE)
    {
        self::$postList[$path] = ['controller' => $controller, 'access' => $accessRole];
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

            if ( !self::validateUserAccess($routeList[$path]['access']) ) {
                (new CommonController())->showNotAuthorized();
                return;
            }

            $controllerData = explode("@", $routeList[$path]['controller']);

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

    private static function validateUserAccess(string $pathAccessRole)
    {
        if ( $pathAccessRole == User::ROLE_ADMIN ) {
            if ( AuthSession::validateAdmin() ) {
                return true;
            }
            return false;
        } elseif ( $pathAccessRole == User::ROLE_MANAGER ) {
            if ( AuthSession::validateManager() ) {
                return true;
            }
            return false;
        } elseif ( $pathAccessRole == User::ROLE_USER ) {
            if ( AuthSession::validateUser() ) {
                return true;
            }
            return false;
        }

        return true;
    }

}