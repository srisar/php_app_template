<?php

use App\Core\App;
use App\Core\View;
use App\Models\User;


/** @var User $user */
$user = View::getData('user');

?>

<?php include_once BASE_PATH . '/views/_header.inc.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <div class="card">
                    <div class="card-header"><h1>Edit <?= $user->display_name ?></h1></div>
                    <div class="card-body">

                        <form action="<?= App::url('/users/process-edit') ?>" method="post" novalidate class="needs-validation">

                            <input type="hidden" name="id" value="<?= $user->id ?>">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="field_display_name">Display name</label>
                                        <input type="text" class="form-control" id="field_display_name" name="display_name" required value="<?= $user->display_name ?>">
                                        <div class="invalid-feedback">Display name cannot be empty</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="field_username">Username</label>
                                        <input type="text" class="form-control" id="field_username" name="username" required value="<?= $user->username ?>">
                                        <div class="invalid-feedback">Username cannot be empty</div>

                                        <?php renderFlashErrorFeedback('username_exists'); ?>

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="field_password">Password</label>
                                        <input type="password" class="form-control" id="field_password" name="password">
                                        <?php renderFlashErrorFeedback('password_length'); ?>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="dropdown_user_role">User role</label>
                                        <select name="user_role" id="dropdown_user_role" class="form-control">

                                            <?php foreach ( User::ROLE_LIST as $key => $value ): ?>
                                                <?php $selected = $key == $user->role ? 'selected' : ''; ?>
                                                <option <?= $selected ?> value="<?= $key ?>"><?= $value ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="<?= App::url('/users') ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <div class="alert alert-info">
                                        &rarr; Keep password field empty to retain old password.
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include_once BASE_PATH . '/views/_footer.inc.php'; ?>