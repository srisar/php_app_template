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


}