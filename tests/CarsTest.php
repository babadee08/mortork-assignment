<?php

namespace Motork;

use Motork\Models\Cars;
use PHPUnit\Framework\TestCase;

class CarsTest extends TestCase
{

    public function test_find_car_returns_result()
    {
        $car = Cars::find(1293);

        $this->assertArrayHasKey('car', $car);

        $this->assertArrayHasKey('attrs', $car['car']);
    }

    public function test_get_all_cars()
    {
        $cars = Cars::all();

        $this->assertArrayHasKey('cars', $cars);

        $this->assertArrayHasKey('attrs', $cars['cars'][0]);
    }
}
