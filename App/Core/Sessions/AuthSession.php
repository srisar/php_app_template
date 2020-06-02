<?php


namespace App\Core\Sessions;


use App\Models\User;

class AuthSession
{

    public static function init(User $user)
    {
        $_SESSION['_AUTH'] = [
            'AUTHENTICATED' => 'true',
            'USER' => [
                'USERNAME' => $user->username,
                'DISPLAY_NAME' => $user->display_name,
                'ROLE' => $user->role
            ],
        ];
    }

    public static function destroy()
    {
        $_SESSION['_AUTH'] = null;
    }

}