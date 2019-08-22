<?php

namespace TestsLoginMemoryPersistent\Application;

use LoginMemoryPersistent\Application\CheckLogin;
use LoginMemoryPersistent\Domain\Exceptions\ErrorLoginException;
use LoginMemoryPersistent\Domain\Exceptions\UnavailableUserException;
use LoginMemoryPersistent\Domain\Repository\UserSearchRepositoryInterface;
use TestsLoginMemoryPersistent\Shared\GenerateUser;

class CheckLoginTest extends \PHPUnit_Framework_TestCase
{

    protected $userSearchRepository;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the auto generated stub
        $this->userSearchRepository = $this
            ->getMockBuilder(UserSearchRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testCheckCorrectLogin()
    {
        $checkUserUseCase = new CheckLogin($this->userSearchRepository);
        $returnUser = GenerateUser::getUser('user','password');

        $this->userSearchRepository
            ->expects($this->once())
            ->method('findByUsername')
            ->will($this->returnValue($returnUser));

        $this->assertTrue($checkUserUseCase->tryLogin('user','password'));
    }

    public function testUnavailableUserOnCheckLogin()
    {
        $checkUserUseCase = new CheckLogin($this->userSearchRepository);

        $this->userSearchRepository
            ->expects($this->once())
            ->method('findByUsername')
            ->will($this->returnValue(null));

        $this->expectException(UnavailableUserException::class);
        $checkUserUseCase->tryLogin('incorrectUser', 'password');
    }

    public function testErrorLoginOnCheckLogin()
    {
        $checkUserUseCase = new CheckLogin($this->userSearchRepository);
        $returnUser = GenerateUser::getUser('user','password');

        $this->userSearchRepository
            ->expects($this->once())
            ->method('findByUsername')
            ->will($this->returnValue($returnUser));

        $this->expectException(ErrorLoginException::class);
        $this->assertFalse($checkUserUseCase->tryLogin('user','incorrectPassword'));
    }
}
