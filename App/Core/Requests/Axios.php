<?php


namespace App\Core\Requests;


class Axios
{

    /**
     * The method returns a request sent by axios js library.
     * @return array
     */
    public static function get()
    {
        $_POST = json_decode(file_get_contents("php://input"), true);
        return $_POST;
    }

}