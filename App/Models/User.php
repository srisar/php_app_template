<?php


namespace App\Models;


use App\Core\Database\DB;

class User
{

    public ?int $id;
    public ?string $username, $password, $display_name, $created_at, $updated_at;

    public static function buildUser($fields)
    {
        $user = new User();
        foreach ( $fields as $key => $value ) {
            $user->$key = $value;
        }
        return $user;
    }


    public function insert()
    {
        $db = DB::instance();

        $statement = $db->prepare("INSERT INTO users(username, password, display_name) values (?, ?, ?)");

        if ( $statement->execute([$this->username, $this->password, $this->display_name]) ) {
            return true;
        }

        return false;
    }

}