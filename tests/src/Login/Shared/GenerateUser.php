<?php

namespace TestsLoginMemoryPersistent\Shared;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\ValueObject\Password;
use LoginMemoryPersistent\Domain\ValueObject\Username;

class GenerateUser
{
    /**
     * @param String $username
     * @param String $password
     * @return User
     */
    public static function getUser(String $username, String $password)
    {

        $username = new Username($username);
        $password = new Password($password);
        $user = new User($username, $password);

        return $user;
    }
}