<?php

use App\Core\Router;

/*
 * ---------------------------------------------------------------------------------------
 * | Routes for the web based views
 * ---------------------------------------------------------------------------------------
 *
 */

Router::get("/", "PagesController@index");
Router::get("/contact", "PagesController@contact");
Router::get("/about", "PagesController@about");