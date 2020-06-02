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
                    <div class="card-header"><h1>Manage users</h1></div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
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
                                    <td><?= $user->username ?></td>
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