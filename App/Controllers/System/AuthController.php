<?php


namespace App\Controllers\System;


use App\Core\App;
use App\Core\Requests\Axios;
use App\Core\Requests\JSONResponse;
use App\Core\Sessions\AuthSession;
use App\Core\View;

class AuthController
{

    public function viewLogin()
    {
        View::render("system/auth/login.view");
    }


    public function processLogout()
    {
        AuthSession::destroy();

        App::redirect('/');

    }

    public function apiProcessLogin()
    {

        $fields = Axios::get();

        if ( authenticate($fields['username'], $fields['password']) ) {
            (new JSONResponse(["data" => "Login succeeded"]))->response();
            return;
        } else {
            JSONResponse::invalidResponse(['data' => 'Invalid username or password']);
            return;
        }

    }

}