<?php

use App\Core\Router;

/*
 * ---------------------------------------------------------------------------------------
 * | Routes for the web based views
 * ---------------------------------------------------------------------------------------
 */

Router::get("/", "PagesController@index");


/*
 * ---------------------------------------------------------------------------------------
 * | Routes for auth system
 * ---------------------------------------------------------------------------------------
 */

Router::get('/login', "System\AuthController@viewLogin");
Router::get('/logout', 'System\AuthController@processLogout');
Router::post('/auth/process-login', 'System\AuthController@processLogin');
