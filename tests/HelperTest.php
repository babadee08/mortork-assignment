<?php

namespace Motork;


use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{

    public function test_csrf_token_validation()
    {
        $token = generateToken('sample-form');

        $crap = checkToken($token, 'sample-form');

        $this->assertTrue($crap);
    }

    public function test_validate_session_messages()
    {
        $message = 'Leads Created';

        setResponseMessage($message, 'info');

        $check = checkSessionMessage('info');

        $this->assertTrue($check);

        $msg = getSessionMessage('info');

        $this->assertEquals($msg, $message);

        $falsy_check = checkSessionMessage('info');

        $this->assertFalse($falsy_check);
    }

}
