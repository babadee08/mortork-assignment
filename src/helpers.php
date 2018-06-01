<?php
/**
 * Created by PhpStorm.
 * User: damilare-konga
 * Date: 5/31/18
 * Time: 5:30 PM
 */

/**
 * @param $name
 * @param array $data
 * @return mixed
 */
function view($name, $data = []) {

    extract($data);

    return require "../views/{$name}.php";
}