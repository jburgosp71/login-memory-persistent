<?php
/**
 * Created by PhpStorm.
 * User: wallaxe
 * Date: 21/08/2019
 * Time: 19:02
 */

use LoginMemoryPersistent\Domain\ValueObject\Username;

class UsernameValueObjectTest extends PHPUnit_Framework_TestCase
{
    public function testEquals()
    {
        $usernameTestA = new Username('username');
        $usernameTestB = new Username('username');

        $this->assertTrue($usernameTestA->equals($usernameTestA));
        $this->assertFalse($usernameTestA->equals($usernameTestB));
    }
}
