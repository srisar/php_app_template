<?php


namespace App\Controllers;


use App\Core\View;

class PagesController
{

    public function index()
    {
        View::render("index.view");
    }

}