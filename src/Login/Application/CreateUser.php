<?php
/**
 * Created by PhpStorm.
 * User: wallaxe
 * Date: 21/08/2019
 * Time: 19:05
 */

namespace LoginMemoryPersistent\Application;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\ValueObject\Password;
use LoginMemoryPersistent\Domain\ValueObject\Username;
use LoginMemoryPersistent\Infraestructure\Persistence\Memory\UserRepository;

class CreateUser
{
    protected $userRepository;

    /**
     * CreateUser constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $user
     * @param $password
     * @return bool
     */
    public function addUser($user, $password) {
        $userEntity = new User(new Username($user), new Password($password));
        $this->userRepository->save($userEntity);

        return true;
    }

}