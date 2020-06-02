<?php

require_once "../app.php";

use App\Core\Database\Database;
use App\Models\User;

$query_create_users = "CREATE TABLE `users` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`display_name` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`role` ENUM('ADMIN','MANAGER','USER') NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci';";

$query_drop_users = "DROP TABLE `users`;";


echo "CREATE/DROP USER TABLE\n";
echo "1. Create\n";
echo "2. Drop\n";

$choice = readline("Choice(default=1): ");

if ( $choice == "1" ) {
    create($query_create_users);
} elseif ( $choice == "2" ) {
    drop($query_drop_users);
} else {
    create($query_create_users);
}

function create($query)
{
    try {
        $db = Database::instance();
        if ( $db->query($query) ) {
            echo "Users table created successfully!\n";
            createAdminUser();
        } else {
            echo "Creating users table failed.\n";
        }
    } catch ( PDOException $exception ) {
        die($exception->getMessage());
    }
}

function drop($query)
{
    try {
        $db = Database::instance();
        if ( $db->query($query) ) {
            echo "Users table dropped!\n";
        } else {
            echo "Dropping users table failed.\n";
        }
    } catch ( PDOException $exception ) {
        die($exception->getMessage());
    }
}

function createAdminUser()
{
    $username = readline("admin username: ");
    $password = readline("admin password: ");
    $displayName = readline("admin display name: ");

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $user = User::build([
        'username' => $username,
        'password' => $hashedPassword,
        'display_name' => $displayName,
        'role' => User::ROLE_ADMIN
    ]);

    if ( $user->insert() ) {
        echo "Admin user added!";
    }

}