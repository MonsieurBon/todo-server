<?php

declare(strict_types=1);

namespace Todo\Tests\Model\User;

use Todo\Exception\InvalidUserNameException;
use Todo\Model\User\UserName;
use PHPUnit\Framework\TestCase;
use Todo\ValueObject;

class UserNameTest extends TestCase
{
    public function testCreate()
    {
        $userName = UserName::fromString('foo');

        self::assertNotNull($userName);
        self::assertEquals('foo', $userName->toString());
    }

    public function testCreateWithBlankUserNameThrowsException()
    {
        $this->expectException(InvalidUserNameException::class);
        $this->expectExceptionMessage('Invalid UserName');
        $this->expectExceptionCode(0);

        UserName::fromString('      ');
    }

    public function testEquals()
    {
        $userName = UserName::fromString('foo');
        $sameUserName = UserName::fromString('foo');
        $otherUserName = UserName::fromString('bar');

        /** @var ValueObject $otherValueObject */
        $otherValueObject = $this->createMock(ValueObject::class);

        $this->assertTrue($userName->equals($sameUserName));
        $this->assertTrue($sameUserName->equals($userName));

        $this->assertFalse($userName->equals($otherUserName));
        $this->assertFalse($otherUserName->equals($userName));

        $this->assertFalse($userName->equals($otherValueObject));
    }
}
