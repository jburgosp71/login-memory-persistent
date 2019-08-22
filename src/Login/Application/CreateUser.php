<?php

namespace LoginMemoryPersistent\Application;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\Repository\UserSaveRepositoryInterface;
use LoginMemoryPersistent\Domain\ValueObject\Password;
use LoginMemoryPersistent\Domain\ValueObject\Username;

class CreateUser
{
    protected $userSaveRepository;

    /**
     * CreateUser constructor.
     * @param UserSaveRepositoryInterface $userSaveRepository
     */
    public function __construct(UserSaveRepositoryInterface $userSaveRepository)
    {
        $this->userSaveRepository = $userSaveRepository;
    }

    /**
     * @param String $user
     * @param String $password
     * @return bool
     */
    public function addUser(String $user, String $password) : bool
    {
        $userEntity = new User(new Username($user), new Password($password));
        $this->userSaveRepository->save($userEntity);

        return true;
    }
}