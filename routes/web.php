<?php

use App\Core\Router;
use App\Models\User;

/*
 * ---------------------------------------------------------------------------------------
 * | Routes for the web based views
 * ---------------------------------------------------------------------------------------
 */

Router::get("/", "PagesController@index");
Router::get("/hello", "PagesController@hello", User::ROLE_ADMIN);


/*
 * ---------------------------------------------------------------------------------------
 * | Routes for auth system
 * ---------------------------------------------------------------------------------------
 */

Router::get('/login', "System\AuthController@viewLogin");
Router::get('/logout', 'System\AuthController@processLogout');
Router::post('/auth/process-login', 'System\AuthController@processLogin');

/*
 * ---------------------------------------------------------------------------------------
 * | Routes for user management
 * ---------------------------------------------------------------------------------------
 */
Router::get('/users', "System\UsersController@viewUsers", User::ROLE_ADMIN);
Router::get('/users/add', "System\UsersController@viewAddUser", User::ROLE_ADMIN);
Router::post('/users/process-add', "System\UsersController@processAddUser", User::ROLE_ADMIN);