<?php

namespace Motork\Components;


use Motork\Models\Cars;

class Recommender
{
    const IMPORTANT = 5;
    const AVERAGE = 3;
    const NEGLIGIBLE = 1;

    private $tag_weight = [
        'string' => [
            'Perceived level' => self::AVERAGE,
            'Segment' => self::IMPORTANT,
            'Traction' => self::AVERAGE,
            'Roof' => self::NEGLIGIBLE,
            'Fuel type' => self::IMPORTANT,
            'Look' => self::IMPORTANT,
            'Accessibility' => self::IMPORTANT,
            'Internal space' => self::IMPORTANT,
        ],
        'int' => [
            'External size' => self::AVERAGE,
            'Trunk' => self::NEGLIGIBLE,
            'Price' => self::IMPORTANT,
        ],
    ];

    private $allCars;

    /**
     * Recommender constructor.
     */
    public function __construct()
    {
        $this->allCars = Cars::all()['cars'];
    }


    /**
     * @param array $base_car
     * @param int $recommended
     * @return array
     */
    public function getRelatedCars(array $base_car, int $recommended) : array
    {

        /**
         * Map over the Cars and generate their scores
         */
        $cars = $this->getCarScores($base_car);

        /**
         * Sort the Cars based of their Global Score
         */
        usort($cars, function ($a, $b) {
            return $b['attrs']['score'] <=> $a['attrs']['score'];
        });

        /**
         * return the top 6 cars based on their scores
         */
        return array_slice($cars, 0, $recommended);
    }

    /**
     * @param array $base_car
     * @return array
     */
    public function getCarScores(array $base_car): array
    {
        $tag_weight = $this->tag_weight;

        $cars = array_map(function ($car) use ($base_car, $tag_weight) {

            $base_car_tags = $base_car['car']['tags'];
            $car_tags = $car['tags'];

            // instantiate the temporary variable to keep scores
            $score = 0;
            $intersect = [];

            $string_tags = $tag_weight['string'];
            $integer_tags = $tag_weight['int'];

            /**
             * Calculate the weight score based on the weight
             * for string matching and track the tags
             * that intersect to get the score.
             */
            foreach ($string_tags as $key => $val) {
                if ($base_car_tags[$key] == $car_tags[$key]) {
                    $intersect[] = $key;
                    $score += $val;
                }
            }

            /**
             * Do the same for the integers,
             * I used pattern matching for the integers
             * This might not be completely accurate
             * but it provides some sort of metrics
             */
            foreach ($integer_tags as $key => $value) {

                $base_value = 0;
                $car_value = 0;

                if (preg_match('/\d+/', $base_car_tags[$key], $matches)) {
                    $base_value = $matches[0];
                }

                if (preg_match('/\d+/', $car_tags[$key], $matches)) {
                    $car_value = $matches[0];
                }

                $absolute_value = abs($base_value - $car_value);

                if ($absolute_value === 0)
                    continue;

                $score += ($absolute_value / $base_value) * $value;
                $intersect[] = $key;
            }

            /**
             * store the score and intersect on the car array
             * and return the car.
             */

            $car['attrs']['score'] = $score;
            $car['attrs']['intersect'] = $intersect;

            return $car;

        }, $this->allCars);

        return $cars;
    }

}