<?php

declare(strict_types=1);

namespace Todo\Tests\Model\User;

use Todo\Exception\InvalidEmailAddressException;
use Todo\Model\User\EmailAddress;
use PHPUnit\Framework\TestCase;
use Todo\ValueObject;

class EmailAddressTest extends TestCase
{
    public function testCreate()
    {
        $emailAddress = EmailAddress::fromString('john.doe@example.com');

        self::assertNotNull($emailAddress);
        self::assertEquals('john.doe@example.com', $emailAddress->toString());
    }

    public function testCreateWithInvalidAddressThrowsException()
    {
        $this->expectException(InvalidEmailAddressException::class);
        $this->expectExceptionMessage('Invalid Email');
        $this->expectExceptionCode(0);

        EmailAddress::fromString('foo');
    }

    public function testEquals()
    {
        $emailAddress = EmailAddress::fromString('john.doe@example.com');
        $sameEmailAddress = EmailAddress::fromString('john.doe@example.com');
        $otherEmailAddress = EmailAddress::fromString('jane.doe@example.com');

        /** @var ValueObject $otherValueObject */
        $otherValueObject = $this->createMock(ValueObject::class);

        $this->assertTrue($emailAddress->equals($sameEmailAddress));
        $this->assertTrue($sameEmailAddress->equals($emailAddress));

        $this->assertFalse($emailAddress->equals($otherEmailAddress));
        $this->assertFalse($otherEmailAddress->equals($emailAddress));

        $this->assertFalse($emailAddress->equals($otherValueObject));
    }
}
