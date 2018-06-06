<?php

namespace Motork\Database;


class Connection
{
    public static function make()
    {
        try {
            return new \PDO('sqlite:'. PATH_TO_DB);
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
    }

}