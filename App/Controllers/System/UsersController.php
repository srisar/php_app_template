<?php


namespace App\Controllers\System;


use App\Core\App;
use App\Core\ErrorMessages;
use App\Core\Request;
use App\Core\View;
use App\Models\User;

class UsersController
{

    /**
     * View - Display all users page
     */
    public function viewUsers()
    {

        $users = User::findAll();

        View::setData('users', $users);
        View::render("system/users/index.view");
    }


    /**
     * View - Display add new user page
     */
    public function viewAddUser()
    {
        View::render('system/users/add.view');
    }

    /**
     * View - Display edit user page
     */
    public function viewEditUser()
    {

        $id = Request::getAsInteger('id');

        if(is_null($id)){
            App::redirect('/');
            return;
        }

        $user = User::find($id);

        if(empty($user)){
            App::redirect('/');
            return;
        }

        View::setData('user', $user);
        View::render('system/users/edit.view');


    }


    /**
     * Process - Add a new user
     */
    public function processAddUser()
    {

        $fields = [
            'username' => Request::getAsString('username'),
            'password' => Request::getAsString('password'),
            'display_name' => Request::getAsString('display_name'),
            'role' => Request::getAsString('user_role'),
        ];

        $isValid = true;

        if ( User::findByUsername($fields['username']) ) {
            $isValid = false;
            ErrorMessages::push('username_exists', 'Username is not available');
            App::redirect('/users/add');
            return;
        }

        if ( strlen($fields['password']) < 5 ) {
            $isValid = false;
            ErrorMessages::push('password_length', 'Password cannot be less than 6 letters');
            App::redirect('/users/add');
            return;
        }

        if ( $isValid ) {

            $fields['password'] = hashPassword($fields['password']);
            $user = User::build($fields);

            if ( $user->insert() ) {
                App::redirect('/users');
            }

        }


    }

}