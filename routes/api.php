<?php

use App\Core\Router;
use App\Models\User;

/*
 * ---------------------------------------------------------------------------------------
 * | Routes for the api access
 * ---------------------------------------------------------------------------------------
 */

Router::post('/api/auth/process-login', "System\AuthController@apiProcessLogin", User::ROLE_NONE);

Router::post('/api/users/process-add', "System\UsersController@apiProcessAdduser", User::ROLE_ADMIN);