<?php

namespace Tests\LoginMemoryPersistent\Application;

use LoginMemoryPersistent\Application\CreateUser;
use LoginMemoryPersistent\Application\FindUser;
use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Infraestructure\Persistence\Memory\UserRepository;

class FindUserTest extends \PHPUnit_Framework_TestCase
{
    public function testFindExistUser()
    {
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUser($userRepository);
        $findUserUseCase = new FindUser($userRepository);

        $createUserUseCase->addUser('user1','password');
        $createUserUseCase->addUser('user2','password');
        $createUserUseCase->addUser('user3','password');
        $this->assertTrue($findUserUseCase->findUser('user2'));
    }

    public function testFindNotExistUser()
    {
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUser($userRepository);
        $findUserUseCase = new FindUser($userRepository);

        $createUserUseCase->addUser('user1','password');
        $createUserUseCase->addUser('user2','password');
        $createUserUseCase->addUser('user3','password');

        $this->expectException('LoginMemoryPersistent\Domain\Exceptions\UnavailableUserException');
        $this->assertTrue($findUserUseCase->findUser('userUnavailable'));
    }

    public function testGetUser()
    {
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUser($userRepository);
        $findUserUseCase = new FindUser($userRepository);

        $createUserUseCase->addUser('user1','password');
        $createUserUseCase->addUser('user2','password');
        $createUserUseCase->addUser('user3','password');

        $this->assertTrue($findUserUseCase->getUserEntity('user2') instanceof User);
    }
}
