<?php

namespace Motork;

use Motork\Components\Recommender;
use Motork\Models\Cars;
use PHPUnit\Framework\TestCase;

class RecommenderTest extends TestCase
{
    public function testGetRelatedCars()
    {
        $total_recommended_result = 5;
        $car = Cars::find(1293);

        $rec = new Recommender();

        $result = $rec->getRelatedCars($car, $total_recommended_result);

        $this->assertNotNull($result);

        $this->assertSame($total_recommended_result, count($result));
    }
}
