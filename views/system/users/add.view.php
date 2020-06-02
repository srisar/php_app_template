<?php


?>

<?php use App\Core\App;
use App\Models\User;

include_once BASE_PATH . '/views/_header.inc.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <div class="card">
                    <div class="card-header"><h1>Add new user</h1></div>
                    <div class="card-body">

                        <form action="<?= App::url('/users/process-add') ?>" method="post" novalidate class="needs-validation">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="field_display_name">Display name</label>
                                        <input type="text" class="form-control" id="field_display_name" name="display_name" required>
                                        <div class="invalid-feedback">Display name cannot be empty</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="field_username">Username</label>
                                        <input type="text" class="form-control" id="field_username" name="username" required>
                                        <div class="invalid-feedback">Username cannot be empty</div>

                                        <?php renderErrorFeedback('username_exists'); ?>

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="field_password">Password</label>
                                        <input type="password" class="form-control" id="field_password" name="password" required>
                                        <div class="invalid-feedback">Password cannot be empty</div>
                                        <?php renderErrorFeedback('password_length'); ?>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="dropdown_user_role">User role</label>
                                        <select name="user_role" id="dropdown_user_role" class="form-control">
                                            <option value="<?= User::ROLE_USER ?>">User</option>
                                            <option value="<?= User::ROLE_MANAGER ?>">Manager</option>
                                            <option value="<?= User::ROLE_ADMIN ?>">Administrator</option>
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


                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include_once BASE_PATH . '/views/_footer.inc.php'; ?>