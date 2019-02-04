<?php

declare(strict_types=1);

namespace Todo\Tests\Model\User;

use PHPUnit\Framework\TestCase;
use Todo\Model\User\UserId;
use Todo\Tests\MockUuid;
use Todo\Uuid;

class UserIdTest extends TestCase
{
    public function testGenerate()
    {
        $userid = UserId::generate();
        self::assertTrue($userid instanceof UserId);
        self::assertTrue(\Ramsey\Uuid\Uuid::isValid($userid->toString()));
    }

    public function testFromString()
    {
        $userid = UserId::fromString('f6a032ac-9151-41cf-adff-c8b67532b5f8');
        self::assertTrue($userid instanceof UserId);
        self::assertEquals('f6a032ac-9151-41cf-adff-c8b67532b5f8', $userid->toString());
    }

    public function testEquals()
    {
        $userid1 = UserId::generate();
        $userid2 = UserId::generate();

        self::assertFalse($userid1->equals($userid2));
        self::assertFalse($userid2->equals($userid1));

        $userid3 = UserId::generate();
        $userid4 = UserId::fromString($userid3->toString());

        self::assertTrue($userid3->equals($userid4));
        self::assertTrue($userid4->equals($userid3));

        $otherClass = MockUuid::fromString($userid1->toString());
        self::assertFalse($userid1->equals($otherClass));
    }
}
