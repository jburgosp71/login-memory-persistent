<?php

namespace LoginMemoryPersistent\Domain\ValueObject;

class Password
{
    protected $hashedPassword;

    /**
     * Password constructor.
     * @param $password
     */
    public function __construct($password)
    {
        $this->hashedPassword = $this->hashPassword($password);
    }

    private function hashPassword($password) {
        return password_hash($password,  PASSWORD_DEFAULT);
    }

    /**
     * @return boolean
     */
    public function isCorrectPassword($password)
    {
        return password_verify($password, $this->getHashedPassword());
    }

    /**
     * @return string
     */
    private function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    public function equals(Password $password)
    {
        return $this === $password;
    }

    public function __toString()
    {
        return $this->hashedPassword;
    }
}