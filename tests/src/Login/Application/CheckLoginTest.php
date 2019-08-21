<?php
/**
 * Created by PhpStorm.
 * User: wallaxe
 * Date: 21/08/2019
 * Time: 23:19
 */

namespace Tests\LoginMemoryPersistent\Application;

use LoginMemoryPersistent\Application\CheckLogin;
use LoginMemoryPersistent\Application\CreateUser;
use LoginMemoryPersistent\Infraestructure\Persistence\Memory\UserRepository;

class CheckLoginTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckCorrectLogin()
    {
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUser($userRepository);
        $checkUserUseCase = new CheckLogin($userRepository);

        $createUserUseCase->addUser('user1','password');
        $createUserUseCase->addUser('user2','password');
        $createUserUseCase->addUser('user3','password');

        $this->assertTrue($checkUserUseCase->isValidLogin('user2','password'));
    }

    public function testUserUnavailableOnCheckLogin()
    {
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUser($userRepository);
        $checkUserUseCase = new CheckLogin($userRepository);

        $createUserUseCase->addUser('user1','password');
        $createUserUseCase->addUser('user2','password');
        $createUserUseCase->addUser('user3','password');

        $this->expectException('LoginMemoryPersistent\Domain\Exceptions\UnavailableUserException');
        $this->assertTrue($checkUserUseCase->isValidLogin('userUnavailable','password'));
    }

    public function testCheckNotCorrectLogin()
    {
        $userRepository = new UserRepository();
        $createUserUseCase = new CreateUser($userRepository);
        $checkUserUseCase = new CheckLogin($userRepository);

        $createUserUseCase->addUser('user1','password');
        $createUserUseCase->addUser('user2','password');
        $createUserUseCase->addUser('user3','password');

        $this->assertFalse($checkUserUseCase->isValidLogin('user2','incorrectPassword'));
    }
}
