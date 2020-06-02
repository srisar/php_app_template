<?php


namespace App\Controllers\System;


use App\Core\View;

class CommonController
{

    public function show404()
    {
        http_response_code(404);
        View::render("system/404.view");
    }

    public function showNotAuthorized()
    {
        http_response_code(403);
        View::render("system/403.view");
    }

}