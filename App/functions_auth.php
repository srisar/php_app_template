<?php


use App\Core\Sessions\AuthSession;
use App\Models\User;

function authenticate(array $fields): bool
{
    $tempUser = User::findByUsername($fields['username']);

    if ( !is_null($tempUser) ) {
        // user seems to be existing with the given username,
        // lets check if password matches
        if ( password_verify($fields['password'], $tempUser->password) ) {
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