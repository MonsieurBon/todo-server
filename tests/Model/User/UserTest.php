<?php

declare(strict_types=1);

namespace Todo\Tests\Model\User;

use PHPUnit\Framework\TestCase;
use Todo\Model\User\EmailAddress;
use Todo\Model\User\User;
use Todo\Model\User\UserName;
use Todo\Uuid;

class UserTest extends TestCase
{
    public function testRegisterUser()
    {
        $userId = Uuid::generate();
        $userName = UserName::fromString('foo');
        $emailAddress = EmailAddress::fromString('foo@example.com');

        $user = User::registerWithData($userId, $userName, $emailAddress);
        self::assertNotNull($user);
        self::assertEquals($userId, $user->userId());
    }
}
