<?php

namespace Tests\LoginMemoryPersistent\Domain\Entity;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\ValueObject\Password;
use LoginMemoryPersistent\Domain\ValueObject\Username;

class UserEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testUserEntity()
    {
        $username = new Username('username');
        $password = new Password('password');

        $user = new User($username, $password);

        $this->assertEquals($username, $user->getUsername());
        $this->assertEquals($password, $user->getPassword());
        $this->assertTrue($password->equals($user->getPassword()));
    }
}
