<?php

namespace Motork\Models;


class Lead extends BaseModel
{
    protected $table = 'leads_table';

    public static function create($data)
    {
        $model = new static();

        return $model->insert($data);
    }
}