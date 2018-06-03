<?php

namespace Motork;


use Motork\Models\Cars;
use Motork\Models\Lead;

class CarController extends BaseController
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

    public function saveLeads()
    {
        $this->validatePostRequest(['name', 'surname', 'email', 'phone', 'zip'], $_POST);

        $data = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'zip' => $_POST['zip'],
        ];

        if (!Lead::create($data)) {
            print_r('Something went wrong');
        }

        redirect();
    }
}