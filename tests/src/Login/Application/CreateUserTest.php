<?php

namespace Tests\LoginMemoryPersistent\Application;

use LoginMemoryPersistent\Application\CreateUser;
use LoginMemoryPersistent\Infraestructure\Persistence\Memory\UserRepository;

class CreateUserTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateCorrectlyUser() {
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUser($userRepository);

        $this->assertTrue($createUserUseCase->addUser('user','password'));
    }

    public function testDuplicatedUserCreation() {
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUser($userRepository);
        $createUserUseCase->addUser('user','password');

        $this->expectException('LoginMemoryPersistent\Domain\Exceptions\DuplicatedUserException');
        $createUserUseCase->addUser('user','password');
    }
}
