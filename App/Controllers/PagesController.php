<?php


namespace App\Controllers;


use App\Core\View;
use App\Models\User;

class PagesController
{

    public function index()
    {

        View::render("index.view");
    }

    public function hello()
    {
        echo "this can only be viewed by admin";
    }


}