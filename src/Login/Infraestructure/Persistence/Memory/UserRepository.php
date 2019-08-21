<?php

namespace LoginMemoryPersistent\Infraestructure\Persistence\Memory;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\Exceptions\DuplicatedUserException;
use LoginMemoryPersistent\Domain\Exceptions\UnavailableUserException;
use LoginMemoryPersistent\Domain\Repository\UserSaveRepositoryInterface;
use LoginMemoryPersistent\Domain\Repository\UserSearchRepositoryInterface;

class UserRepository implements UserSaveRepositoryInterface, UserSearchRepositoryInterface
{
    protected $userArray;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->userArray = array();
    }

    /**
     * @param User $user
     * @throws DuplicatedUserException
     */
    public function save(User $user)
    {
        try {
            if ($this->findByUserName($user->getUsername()) instanceof User) {
                throw new DuplicatedUserException();
            }
        } catch (UnavailableUserException $e) {
            $this->userArray[] = $user;
        }
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->userArray;
    }

    /**
     * @param $username
     * @return mixed
     * @throws UnavailableUserException
     */
    public function findByUserName($username)
    {
        foreach ($this->userArray as $user) {
            if ($username == $user->getUsername()) {
                return $user;
            }
        }

        throw new UnavailableUserException();
    }
}