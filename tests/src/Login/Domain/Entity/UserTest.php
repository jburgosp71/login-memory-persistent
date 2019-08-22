<?php

namespace TestsLoginMemoryPersistent\Domain\Entity;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\ValueObject\Password;
use LoginMemoryPersistent\Domain\ValueObject\Username;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testUserEntity()
    {
        $username = new Username('username');
        $password = new Password('password');

        $user = new User($username, $password);

        $this->assertEquals($username->__toString(), $user->getUsername());
        $this->assertEquals($password->__toString(), $user->getPassword());
    }
}
