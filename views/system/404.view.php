<?php

use App\Core\App;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 | Not found</title>
    <link rel="stylesheet" href="<?= App::siteURL() ?>/css/app.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center text-danger">404 | Not found!</h1>
            <hr>
            <p class="text-center">The page you are looking for is not found.</p>
            <p class="text-center"><a href="<?= App::url('/') ?>">Back to home</a></p>
        </div>
    </div>
</div>

</body>
</html>