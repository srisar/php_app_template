<?php


namespace App\Core\Sessions;


use App\Models\User;

class AuthSession
{

    private const _AUTH = '_AUTH';
    private const _AUTHENTICATED = '_AUTHENTICATED';
    private const _USER = '_USER';
    private const _USERNAME = '_USERNAME';
    private const _DISPLAY_NAME = '_DISPLAY_NAME';
    private const _ROLE = '_ROLE';

    public static function init(User $user)
    {
        $_SESSION[self::_AUTH] = [
            self::_AUTHENTICATED => 'true',
            self::_USER => [
                self::_USERNAME => $user->username,
                self::_DISPLAY_NAME => $user->display_name,
                self::_ROLE => $user->role
            ],
        ];
    }

    public static function destroy()
    {
        unset($_SESSION[self::_AUTH]);
    }


    public static function getUserDisplayName()
    {
        return $_SESSION[self::_AUTH][self::_USER][self::_DISPLAY_NAME];
    }


    public static function validate(): bool
    {
        if ( isset($_SESSION[self::_AUTH][self::_AUTHENTICATED]) ) {
            return true;
        }
        return false;
    }

    public static function validateAdmin(): bool
    {
        if ( self::validate() ) {
            if ( $_SESSION[self::_AUTH][self::_USER][self::_ROLE] == User::ROLE_ADMIN ) return true;
        }
        return false;
    }

    public static function validateUser(): bool
    {
        if ( self::validate() ) {
            if ( $_SESSION[self::_AUTH][self::_USER][self::_ROLE] == User::ROLE_USER ) return true;
        }
        return false;
    }

    public static function validateManager(): bool
    {
        if ( self::validate() ) {
            if ( $_SESSION[self::_AUTH][self::_USER][self::_ROLE] == User::ROLE_MANAGER ) return true;
        }
        return false;
    }


}