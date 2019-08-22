<?php

namespace LoginMemoryPersistent\Domain\ValueObject;

use SebastianBergmann\GlobalState\Exception;

class Username
{
    protected $username;

    /**
     * Username constructor.
     * @param String $username
     */
    public function __construct(String $username)
    {
        $this->isValidUsername($username);

        $this->username = strtolower($username);
    }

    /**
     * @param String $username
     * @return bool|Exception
     */
    private function isValidUsername(String $username) : bool
    {
        // Todo: add validators, return Exception when is not valid
        return true;
    }

    /**
     * @param Username $username
     * @return bool
     */
    public function equals(Username $username) : bool
    {
        return $this === $username;
    }

    /**
     * @return String
     */
    public function __toString() : String
    {
        return $this->username;
    }
}