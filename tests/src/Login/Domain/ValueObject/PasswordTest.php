<?php

namespace TestsLoginMemoryPersistent\Application;

use LoginMemoryPersistent\Domain\ValueObject\Password;

class PasswordTest extends \PHPUnit_Framework_TestCase
{

    public function testEqualsPassword()
    {
        $passwordTestA = new Password('password');
        $passwordTestB = new Password('password');

        $this->assertTrue($passwordTestA->equals($passwordTestA));
        $this->assertFalse($passwordTestA->equals($passwordTestB));
    }
}
