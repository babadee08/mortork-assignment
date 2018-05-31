<?php

namespace Motork;


class CarController
{
    /**
     * Index Action
     *
     * This should contain the list of cars.
     */
    public function getIndex()
    {
        include CONFIG_VIEWS_DIR . '/index.php';
    }

    /**
     * Detail Action
     *
     * This should contain the car's detail and the form.
     */
    public function getDetail()
    {
        include CONFIG_VIEWS_DIR . '/detail.php';
    }

    /**
     * @return CarController
     */
    public static function create()
    {
        return new self();
    }
}