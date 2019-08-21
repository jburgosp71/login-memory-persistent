<?php

namespace LoginMemoryPersistent\Application;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Infraestructure\Persistence\Memory\UserRepository;

class CheckLogin
{
    protected $userRepository;
    protected $findUserUseCase;

    /**
     * CheckLogin constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->findUserUseCase = new FindUser($userRepository);
    }

    /**
     * @param $username
     * @param $password
     * @return mixed
     */
    public function isValidLogin($username, $password)
    {
        $userEntity = $this->findUserUseCase->getUserEntity($username);

        if ($userEntity instanceof User) {
            $passwordValueObject = $userEntity->getPassword();
            return $passwordValueObject->isCorrectPassword($password);
        }

    }
}