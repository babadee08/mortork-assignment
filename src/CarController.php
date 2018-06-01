<?php

namespace Motork;


use Motork\Models\Cars;

class CarController
{
    /**
     * Index Action
     *
     * This should contain the list of cars.
     */
    public function getIndex()
    {
        $cars = Cars::all();

        return view('index', $cars);
    }

    /**
     * Detail Action
     *
     * This should contain the car's detail and the form.
     * @param $car_id
     * @return mixed
     */
    public function getDetail($car_id)
    {
        $car = Cars::find($car_id);

        return view('detail', $car);
    }

    /**
     * @return CarController
     */
    public static function create()
    {
        return new self();
    }
}