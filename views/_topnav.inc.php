<?php

use App\Core\App;
use App\Core\Sessions\AuthSession;

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= App::url('/') ?>"><?= App::appName() ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

        </ul>

        <div>

            <?php if (AuthSession::validate()): ?>
                <span class="text-white mr-2">Welcome, <?= AuthSession::getUserDisplayName() ?></span>

                <?php if (AuthSession::validateAdmin()): ?>
                    <a href="<?= App::url('/users') ?>" class="btn btn-secondary">Manage Users</a>
                <?php endif; ?>

                <a href="<?= App::url('/logout') ?>" class="btn btn-danger">Logout</a>
            <?php else: ?>
                <a href="<?= App::url('/login') ?>" class="btn btn-success">Login</a>
            <?php endif; ?>


        </div>

    </div>
</nav>
