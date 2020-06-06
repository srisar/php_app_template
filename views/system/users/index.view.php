<?php

use App\Core\App;
use App\Core\View;
use App\Models\User;

/** @var User[] $users */
$users = View::getData('users');

?>

<?php include_once BASE_PATH . '/views/_header.inc.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <div class="card">
                    <div class="card-header">
                        <div class="align-content-center">Manage users</div>

                    </div>
                    <div class="card-body">

                        <div class="mb-3 text-right"><a href="<?= App::url('/users/add') ?>" class="btn btn-primary btn-sm">Add new user</a></div>

                        <table class="table table-bordered table-striped datatable_simple">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Display Name</th>
                                <th>User Type</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ( $users as $user ): ?>
                                <tr>
                                    <td><a href="<?= App::url('/users/edit', ['id' => $user->id]) ?>"><?= $user->username ?></a></td>
                                    <td><?= $user->display_name ?></td>
                                    <td><?= $user->role ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include_once BASE_PATH . '/views/_footer.inc.php'; ?>