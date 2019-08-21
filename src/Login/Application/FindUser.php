<?php
/**
 * Created by PhpStorm.
 * User: wallaxe
 * Date: 21/08/2019
 * Time: 20:19
 */

namespace LoginMemoryPersistent\Application;


use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Infraestructure\Persistence\Memory\UserRepository;

class FindUser
{
    protected $userRepository;

    /**
     * FindUser constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $username
     * @return bool
     */
    public function findUser($username)
    {
        if ($this->getUserEntity($username) instanceof User) {
            return true;
        }
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUserEntity($username)
    {
        return $this->userRepository->findByUserName($username);
    }
}