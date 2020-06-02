<?php


namespace App\Core\Database;


use PDO;
use PDOException;

class Database
{

    private static array $config = [
        'HOST' => '',
        'DATABASE' => '',
        'USERNAME' => '',
        'PASSWORD' => '',
    ];
    private static ?PDO $pdo = null;

    public static function init(array $config)
    {
        self::$config = $config;
    }

    public static function instance()
    {
        if ( is_null(self::$pdo) ) {
            return self::createInstance();
        }
        return self::$pdo;
    }

    private static function createInstance()
    {
        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s", self::$config['HOST'], self::$config['DATABASE']);
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS
            ];
            self::$pdo = new PDO($dsn, self::$config['USERNAME'], self::$config['PASSWORD'], $options);

            return self::$pdo;

        } catch ( PDOException $exception ) {
            die($exception->getMessage());
        }
    }

}