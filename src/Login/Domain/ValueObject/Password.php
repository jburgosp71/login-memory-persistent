<?php

namespace LoginMemoryPersistent\Domain\ValueObject;

class Password
{
    protected $hashedPassword;

    /**
     * @var String
     */
    private $password;

    /**
     * Password constructor.
     * @param String $password
     */
    public function __construct(String $password)
    {
        $this->hashedPassword = $this->hashPassword($password);
        $this->password = $password;
    }

    /**
     * @param String $password
     * @return bool|string
     */
    private function hashPassword(String $password) : String
    {
        return password_hash($password,  PASSWORD_DEFAULT);
    }

    /**
     * @return string
     */
    private function getHashedPassword() : String
    {
        return $this->hashedPassword;
    }

    /**
     * @param Password $password
     * @return bool
     */
    public function equals(Password $password) : bool
    {
        return $this === $password;
    }

    /**
     * @return String
     */
    public function __toString() : String
    {
        return $this->hashedPassword;
    }
}