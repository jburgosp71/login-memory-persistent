<?php

namespace LoginMemoryPersistent\Infraestructure\Persistence\Memory;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\Exceptions\DuplicatedUserException;
use LoginMemoryPersistent\Domain\Exceptions\UnavailableUserException;
use LoginMemoryPersistent\Domain\Repository\UserSaveRepositoryInterface;
use LoginMemoryPersistent\Domain\Repository\UserSearchRepositoryInterface;
use LoginMemoryPersistent\Domain\ValueObject\Password;
use LoginMemoryPersistent\Domain\ValueObject\Username;

class UserRepository implements UserSaveRepositoryInterface, UserSearchRepositoryInterface
{
    protected $userArray;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->userArray = [];
    }
    
    /**
     * @param User $user
     * @throws DuplicatedUserException
     */
    public function save(User $user)
    {
        if ($this->findByUsername($user->getUsername()) instanceof User) {
            throw new DuplicatedUserException();
        }

        $this->userArray[$user->getUsername()] = $user->getPassword();
    }

    /**
     * @param User $user
     * @throws UnavailableUserException
     */
    public function update(User $user)
    {
        if (!$this->findByUsername($user->getUsername()) instanceof User) {
            throw new UnavailableUserException();
        }

        $this->userArray[$user->getUsername()] = $user->getPassword();
    }

    /**
     * @param String $username
     * @return mixed|null
     */
    public function findByUsername(String $username)
    {
        if(isset($this->userArray[$username])) {
            $usernameValue = new Username($username);
            $passwordValue = new Password($this->userArray[$username]);
            return new User($usernameValue, $passwordValue);
        }

        return null;
    }

}