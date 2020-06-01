<?php


namespace App\Controllers;


use App\Core\Request;
use App\Core\View;

class PagesController
{

    public function index()
    {
        View::render("index.view");
    }

    public function about()
    {
        $name = Request::getParam('name');

        var_dump($name);

        return "About page!";
    }

}