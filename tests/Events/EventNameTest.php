<?php

declare(strict_types=1);

namespace Todo\Tests\Events;

use Todo\Events\EventName;
use PHPUnit\Framework\TestCase;
use Todo\ValueObject;

class EventNameTest extends TestCase
{
    public function testFromString()
    {
        $eventName = EventName::fromString('foobar');
        self::assertEquals('foobar', $eventName->toString());
    }

    public function testEquality()
    {
        $eventName = EventName::fromString('event');

        /** @var ValueObject $valueObject */
        $valueObject = $this->createMock(ValueObject::class);
        self::assertFalse($eventName->equals($valueObject));

        $sameEventName = EventName::fromString('event');
        self::assertTrue($eventName->equals($sameEventName));
        self::assertTrue($sameEventName->equals($eventName));

        $otherEventName = EventName::fromString('otherEvent');
        self::assertFalse($eventName->equals($otherEventName));
    }
}
