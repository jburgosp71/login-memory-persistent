<?php
/**
 * Created by PhpStorm.
 * User: wallaxe
 * Date: 21/08/2019
 * Time: 17:02
 */

namespace LoginMemoryPersistent\Domain\ValueObject;

class Username
{
    protected $username;

    /**
     * Username constructor.
     * @param $username
     */
    public function __construct($username)
    {
        $this->isValidUsername($username);

        $this->username = $username;
    }

    private function isValidUsername($username)
    {
        // Todo: add validators, return Exception when is not valid
    }

    public function equals(Username $username)
    {
        return $this === $username;
    }

    public function __toString()
    {
        return $this->username;
    }
}