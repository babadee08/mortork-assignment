<?php
/**
 * Created by PhpStorm.
 * User: damilare-konga
 * Date: 6/1/18
 * Time: 12:08 PM
 */

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