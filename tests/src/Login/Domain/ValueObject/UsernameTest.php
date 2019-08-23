<?php

namespace TestsLoginMemoryPersistent\Application;

use LoginMemoryPersistent\Domain\ValueObject\Username;

class UsernameTest extends \PHPUnit_Framework_TestCase
{
    public function testEqualsUsername()
    {
        $usernameTestA = new Username('username');
        $usernameTestB = new Username('username');

        $this->assertTrue($usernameTestA->equals($usernameTestA));
        $this->assertFalse($usernameTestA->equals($usernameTestB));
    }
}
