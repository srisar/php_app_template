<?php

use App\Core\Router;

require_once "../app.php";

//var_dump($_SERVER);

$currentPath = $_SERVER['REDIRECT_URL'] ?? '/';
Router::route($currentPath);


//cleanErrorMessagesBuffer();