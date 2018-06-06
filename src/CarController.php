<?php

namespace Motork;


use Motork\Components\Recommender;
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

        $rec = new Recommender();

        $recommended = $rec->getRelatedCars($car, 6);

        $car['recommendations'] = $recommended;

        return view('detail', $car);
    }

    /**
     * @return CarController
     */
    public static function create()
    {
        try {
            return new self();
        } catch (\Exception $e) {
            setResponseMessage($e->getMessage(), 'error');
            goBack();
        }
    }

    /**
     * Save the leads details and
     * redirects back to the
     * home page.
     */
    public function saveLeads()
    {
        try {
            $this->validatePostRequest(['name', 'surname', 'email', 'phone', 'zip', 'privacy', 'carId'], $_POST);

            $data = [
                'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
                'surname' => filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING),
                'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
                'phone' => filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT),
                'zip' => filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING),
                'privacy' => filter_input(INPUT_POST, 'privacy', FILTER_SANITIZE_STRING),
                'carID' => filter_input(INPUT_POST, 'carId', FILTER_SANITIZE_NUMBER_INT),
            ];

            if (!Lead::create($data)) {
                print_r('Something went wrong');
            }
            setResponseMessage('Leads Saved Successfully', 'status');

            redirect();
        } catch (\Exception $e) {
            setResponseMessage($e->getMessage(), 'error');
            goBack();
        }
    }
}