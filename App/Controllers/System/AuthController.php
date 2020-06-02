<?php


namespace App\Controllers\System;


use App\Core\App;
use App\Core\FlashMessage;
use App\Core\Messages\ErrorMessages;
use App\Core\Request;
use App\Core\Sessions\AuthSession;
use App\Core\View;
use MongoDB\Driver\Session;

class AuthController
{

    public function viewLogin()
    {
        View::render("system/auth/login.view");
    }


    public function processLogin()
    {
        $fields = [
            'username' => Request::getAsString('username'),
            'password' => Request::getAsString('password')
        ];

        if ( authenticate($fields) ) {
            App::redirect('/');
        } else {
            ErrorMessages::push('login', 'Invalid username or password.');
            App::redirect('/login');
        }
    }

    public function processLogout()
    {
        AuthSession::destroy();

        App::redirect('/');

    }

}