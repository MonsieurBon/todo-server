<?php

declare(strict_types=1);

namespace Todo\Tests\Events;

use Todo\Events\EventId;
use PHPUnit\Framework\TestCase;
use Todo\Tests\MockUuid;
use Todo\Uuid;

class EventIdTest extends TestCase
{
    public function testGenerate()
    {
        $eventid = EventId::generate();
        self::assertTrue($eventid instanceof EventId);
        self::assertTrue(\Ramsey\Uuid\Uuid::isValid($eventid->toString()));
    }

    public function testFromString()
    {
        $eventid = EventId::fromString('f6a032ac-9151-41cf-adff-c8b67532b5f8');
        self::assertTrue($eventid instanceof EventId);
        self::assertEquals('f6a032ac-9151-41cf-adff-c8b67532b5f8', $eventid->toString());
    }
    
    public function testEquals()
    {
        $eventid1 = EventId::generate();
        $eventid2 = EventId::generate();

        self::assertFalse($eventid1->equals($eventid2));
        self::assertFalse($eventid2->equals($eventid1));

        $eventid3 = EventId::generate();
        $eventid4 = EventId::fromString($eventid3->toString());

        self::assertTrue($eventid3->equals($eventid4));
        self::assertTrue($eventid4->equals($eventid3));

        $otherClass = MockUuid::fromString($eventid1->toString());
        self::assertFalse($eventid1->equals($otherClass));
    }
}
