<?php

namespace Motork\Database;


interface DBConnectionInterface
{
    public static function make(array $config) : \PDO;
}