<?php

namespace LoginMemoryPersistent\Domain\Entity;

use LoginMemoryPersistent\Domain\ValueObject\Password;
use LoginMemoryPersistent\Domain\ValueObject\Username;

class User
{
    protected $username;
    protected $password;

    /**
     * User constructor.
     * @param $username
     * @param $password
     */
    public function __construct(Username $username, Password $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username->__toString();
    }

    /**
     * @param Username $username
     */
    public function setUsername(Username $username) : void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password->__toString();
    }

    /**
     * @param Password $password
     */
    public function setPassword(Password $password) : void
    {
        $this->password = $password;
    }
}