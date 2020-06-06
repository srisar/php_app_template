<?php

use App\Core\App;
use App\Core\Sessions\AuthSession;


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= App::appName() ?></title>
    <link rel="stylesheet" href="<?= App::siteURL() ?>/css/app.css">
    <script src="<?= App::siteURL() ?>/js/libs/all.js" defer></script>
    <script src="<?= App::siteURL() ?>/js/app.js" defer></script>
</head>
<body>

<?php include_once BASE_PATH . "/views/_topnav.inc.php"; ?>