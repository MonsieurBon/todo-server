<?php

declare(strict_types=1);

namespace Todo\Tests\Events;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Todo\Events\UserWasRegistered;
use Todo\Model\User\EmailAddress;
use Todo\Model\User\UserId;
use Todo\Model\User\UserName;

class UserWasRegisteredTest extends TestCase
{
    public function testCreate()
    {
        $userid = UserId::generate();
        $userName = UserName::fromString('johndoe');
        $emailAddress = EmailAddress::fromString('john.doe@example.com');

        $event = UserWasRegistered::withData($userid, $userName, $emailAddress);

        self::assertNotNull($event);
        self::assertTrue(Uuid::isValid($event->id()->toString()));
        self::assertNotNull($event->metadata());
        self::assertEquals('UserWasRegistered', $event->name()->toString());
        self::assertEquals($userid, $event->aggregateId());
        self::assertEquals($userid, $event->userId());
        self::assertEquals($userName, $event->userName());
        self::assertEquals($emailAddress, $event->emailAddress());
        self::assertEquals($userName->toString(), $event->payload()['username']);
        self::assertEquals($emailAddress->toString(), $event->payload()['email_address']);
    }
}
