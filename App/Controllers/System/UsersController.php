<?php


namespace App\Controllers\System;


use App\Core\View;
use App\Models\User;

class UsersController
{

    public function viewUsers(){

        $users = User::findAll();

        View::setData('users', $users);
        View::render("/users/index.view");
    }



}