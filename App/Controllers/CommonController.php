<?php


namespace App\Controllers;


use App\Core\View;

class CommonController
{

    public function show404()
    {
        View::render("system/404.view");
    }

}