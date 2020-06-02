<?php

use App\Core\App;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= App::appName() ?></title>
    <link rel="stylesheet" href="<?= App::siteURL() ?>/css/app.css">
    <script src="<?= App::siteURL() ?>/js/app.js" defer></script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-12 text-center">
            <h1>PHP APP TEMPLATE</h1>
            <hr>
            <p>This is a simple scaffolding app for router base php application. Feel free to clone and work!</p>
            <p>By Srisaravana</p>
        </div>
    </div>
</div>

</body>
</html>