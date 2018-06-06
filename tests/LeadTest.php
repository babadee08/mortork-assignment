<?php
/**
 * Created by PhpStorm.
 * User: damilare-konga
 * Date: 6/6/18
 * Time: 5:05 AM
 */

namespace Motork;

use Motork\Database\SqliteConnection;
use Motork\Models\Lead;
use PHPUnit\Framework\TestCase;

class LeadTest extends TestCase
{
    const PATH_TO_TEST_DB = __DIR__ . '/../data/motork_dev_phpunit_test';

    protected function setUp()
    {
        exec('vendor/bin/phinx migrate -e testing', $output);
    }

    protected function tearDown()
    {
        exec('vendor/bin/phinx rollback -e testing', $output);
    }

    public function test_model_create_and_read_on_db()
    {
        $data = [
            'name' => 'damilare',
            'surname' => 'durojaye',
            'email' => 'babadee08@gmail.com',
            'phone' => '08111222321',
            'zip' => '100011',
            'privacy' => 'Y',
            'carID' => '1975',
        ];

        $connection = SqliteConnection::make(['database' => self::PATH_TO_TEST_DB]);

        $lead_data = new Lead($connection);

        $response = $lead_data->insert($data);

        $this->assertTrue($response);

        $this->assertSame(1, count($lead_data->selectAll()));
    }

}
