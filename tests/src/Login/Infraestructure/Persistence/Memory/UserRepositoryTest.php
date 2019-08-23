<?php

namespace TestsLoginMemoryPersistent\Infraestructure\Persistence\Memory;

use LoginMemoryPersistent\Domain\Entity\User;
use LoginMemoryPersistent\Domain\ValueObject\Password;
use LoginMemoryPersistent\Infraestructure\Persistence\Memory\UserRepository;
use TestsLoginMemoryPersistent\Shared\GenerateUser;

class UserRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testSave()
    {
        $userRepository = new UserRepository();
        $returnUser = GenerateUser::getUser('user','password');

        $userRepository->save($returnUser);
    }

    public function testUpdate()
    {
        $userRepository = new UserRepository();
        $returnUser = GenerateUser::getUser('user','password');

        $userRepository->save($returnUser);
        $newPassword = new Password('newPassword');
        $returnUser->setPassword($newPassword);

        $userRepository->update($returnUser);
    }

    public function testCorrectOnFindByUsername()
    {
        $userRepository = new UserRepository();
        $returnUser = GenerateUser::getUser('user','password');

        $userRepository->save($returnUser);

        $this->assertTrue($userRepository->findByUsername('user') instanceof User);
    }

    public function testNotCorrectFindByUsername()
    {
        $userRepository = new UserRepository();
        $returnUser = GenerateUser::getUser('user','password');

        $userRepository->save($returnUser);

        $this->assertFalse($userRepository->findByUsername('userNotCorrect') instanceof User);
    }
}
