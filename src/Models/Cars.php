<?php
/**
 * Created by PhpStorm.
 * User: damilare-konga
 * Date: 5/31/18
 * Time: 5:49 PM
 */

namespace Motork\Models;


class Cars
{
    const SUCCESS = 200;

    /**
     * @return array
     */
    public static function all() : array
    {
        $data = [];
        $response =  json_decode(file_get_contents('http://localhost:8889/api.php/search'), true);

        if ($response['status'] == self::SUCCESS) {
            $data['cars'] = $response['data'];
        }

        return $data;
    }

    /**
     * @param int $car_id
     * @return array
     */
    public static function find(int $car_id) : array
    {
        $data = [];
        $response =  json_decode(file_get_contents("http://localhost:8889/api.php/detail/{$car_id}"), true);

        if ($response['status'] == self::SUCCESS) {
            $data['car'] = $response['data'];
        }

        return $data;
    }
}