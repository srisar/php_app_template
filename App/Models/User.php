<?php


namespace App\Models;


use App\Core\Database\Database;
use PDO;

class User implements AbstractModel
{

    public ?int $id;
    public ?string $username, $password, $display_name, $role, $created_at, $updated_at;


    public const ROLE_ADMIN = 'ADMIN';
    public const ROLE_MANAGER = 'MANAGER';
    public const ROLE_USER = 'USER';
    public const ROLE_NONE = 'NONE';

    public static function build($fields)
    {
        $user = new User();
        foreach ( $fields as $key => $value ) {
            $user->$key = $value;
        }
        return $user;
    }


    public static function find(int $id)
    {
        // TODO: Implement find() method.
    }


    /**
     * @param int $limit
     * @param int $offset
     * @return User[]|array
     */
    public static function findAll(int $limit = 1000, int $offset = 0)
    {
        $db = Database::instance();
        $statement = $db->prepare("SELECT * FROM users LIMIT :limit_value OFFSET :offset_value");
        $statement->bindValue(':limit_value', $limit, PDO::PARAM_INT);
        $statement->bindValue(':offset_value', $offset, PDO::PARAM_INT);

        $statement->execute();

        /** @var User[] $result */
        $result = $statement->fetchAll(PDO::FETCH_CLASS, User::class);

        if ( !empty($result) ) {
            return $result;
        }
        return [];
    }

    public function insert()
    {
        $db = Database::instance();

        $statement = $db->prepare("INSERT INTO users(username, password, display_name, role) values (?, ?, ?, ?)");

        if ( $statement->execute([$this->username, $this->password, $this->display_name, $this->role]) ) {
            return true;
        }

        return false;
    }


    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * Returns a user by username, if exists
     * @param string $username
     * @return User|null
     */
    public static function findByUsername(string $username)
    {
        $db = Database::instance();
        $statement = $db->prepare("SELECT * FROM users WHERE username=?");
        $statement->execute([$username]);

        $result = $statement->fetchObject(User::class);
        if ( !empty($result) ) return $result;
        return null;
    }
}