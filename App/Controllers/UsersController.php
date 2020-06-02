<?php


namespace App\Controllers;


use App\Core\View;
use App\Models\User;

class UsersController
{

    public function index(){

        $users = User::findAll();

        View::setData('users', $users);
        View::render("/users/index.view");
    }



}