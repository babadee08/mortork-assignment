<?php

namespace Motork\Database;


class SqliteConnection implements DBConnectionInterface
{
    public static function make(array $config = []) : \PDO
    {
        try {
            $path = realpath($config['database']);

            return new \PDO('sqlite:'. $path);
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
    }

}