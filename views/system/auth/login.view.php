<?php

use App\Core\App;
use App\Core\FlashMessage;
use App\Core\Messages\SessionError;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= App::appName() ?> - Login</title>
    <link rel="stylesheet" href="<?= App::siteURL() ?>/css/app.css">
    <script src="<?= App::siteURL() ?>/js/app.js" defer></script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">

            <div class="card">
                <div class="card-header">Login to <?= App::appName() ?></div>
                <div class="card-body">

                    <?php if ( SessionError::has('login') ): ?>
                        <div class="alert alert-danger">
                            <span><?= SessionError::get('login'); ?></span>
                        </div>
                    <?php endif; ?>

                    <form action="<?= App::url('/auth/process-login') ?>" method="post" class="needs-validation" novalidate>

                        <div class="form-group">
                            <label for="field_username">Username</label>
                            <input type="text" class="form-control" id="field_username" name="username" required>
                            <div class="invalid-feedback">Username cannot be empty.</div>
                        </div>

                        <div class="form-group">
                            <label for="field_password">Password</label>
                            <input type="password" class="form-control" id="field_password" name="password" required>
                            <div class="invalid-feedback">Password cannot be empty</div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>

                    </form>

                </div>
            </div><!--.card-->

        </div><!--.col-->
    </div><!--.row-->
</div>

</body>
</html>