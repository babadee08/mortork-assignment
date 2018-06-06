<?php

namespace Motork\Models;


use Motork\Database\SqliteConnection;

class Lead extends BaseModel
{
    protected $table = 'leads_table';

    public static function create($data)
    {
        $model = new static(SqliteConnection::make([
            'database' => PATH_TO_DB,
        ]));

        return $model->insert($data);
    }
}