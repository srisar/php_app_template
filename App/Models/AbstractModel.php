<?php


namespace App\Models;


interface AbstractModel
{

    public static function build(array $fields);

    public static function find(int $id);

    public static function findAll(int $limit = 1000, int $offset = 0);

    public function insert();

    public function update();

    public function delete();
}