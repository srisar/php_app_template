<?php


namespace App\Controllers;


use App\Core\View;

class CommonController
{

    public function show404()
    {
        return View::render("common/404.view");
    }

}