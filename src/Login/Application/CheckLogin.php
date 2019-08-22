<?php

namespace LoginMemoryPersistent\Application;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\Exceptions\ErrorLoginException;
use LoginMemoryPersistent\Domain\Exceptions\UnavailableUserException;
use LoginMemoryPersistent\Domain\Repository\UserSearchRepositoryInterface;

class CheckLogin
{
    protected $userSearchRepository;

    /**
     * CheckLogin constructor.
     * @param UserSearchRepositoryInterface $userSearchRepository
     */
    public function __construct(UserSearchRepositoryInterface $userSearchRepository)
    {
        $this->userSearchRepository = $userSearchRepository;
    }

    /**
     * @param String $username
     * @param String $password
     * @return bool
     * @throws ErrorLoginException
     * @throws UnavailableUserException
     */
    public function tryLogin(String $username, String $password) : bool
    {
        $user = $this->userSearchRepository->findByUsername($username);
        if (!$user instanceof User) {
            throw new UnavailableUserException();
        }

        $passwordHashed = $user->getPassword();

        if (!password_verify($password, $passwordHashed))
        {
            throw new ErrorLoginException();
        }

        return true;
    }
}