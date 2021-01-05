<?php

declare(strict_types=1);

namespace Todo\Tests\Events;

use PHPUnit\Framework\TestCase;
use Todo\Events\UserWasRegistered;
use Todo\Model\User\EmailAddress;
use Todo\Model\User\UserName;
use Todo\Uuid;

class UserWasRegisteredTest extends TestCase
{
    public function testCreate()
    {
        $userid = Uuid::generate();
        $userName = UserName::fromString('johndoe');
        $emailAddress = EmailAddress::fromString('john.doe@example.com');

        $event = UserWasRegistered::withData($userid, $userName, $emailAddress);

        self::assertNotNull($event);
        self::assertTrue(\Ramsey\Uuid\Uuid::isValid($event->id()->toString()));
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
