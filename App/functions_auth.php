<?php


use App\Core\Sessions\AuthSession;
use App\Models\User;

function authenticate($username, $password): bool
{
    $tempUser = User::findByUsername($username);

    if ( !is_null($tempUser) ) {
        // user seems to be existing with the given username,
        // lets check if password matches
        if ( password_verify($password, $tempUser->password) ) {
            // password matched as well!
            // add user to the session and return true
            AuthSession::init($tempUser);
            return true;
        }
    }
    return false;
}

function hashPassword($password){
    return password_hash($password, PASSWORD_DEFAULT);
}