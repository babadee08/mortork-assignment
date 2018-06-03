<?php
/**
 * Created by PhpStorm.
 * User: damilare-konga
 * Date: 6/1/18
 * Time: 12:40 PM
 */

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