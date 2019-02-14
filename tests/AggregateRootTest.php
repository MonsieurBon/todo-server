<?php

declare(strict_types=1);

namespace Todo\Tests;

use Todo\AggregateRoot;
use PHPUnit\Framework\TestCase;
use Todo\Events\Event;
use Todo\Events\EventName;

class AggregateRootTest extends TestCase
{
    public function testApplyThrowsExceptionForUnimplementedEventHandler()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Missing event handler method whenMyEventName for aggregate root Todo\Tests\AggregateRootMock');

        $event = $this->createMock(Event::class);
        $event->method('name')->willReturn(EventName::fromString('MyEventName'));

        $aggregateRoot = new AggregateRootMock();
        /** @var Event $event */
        $aggregateRoot->callApply($event);
    }
}

class AggregateRootMock extends AggregateRoot {
    public function callApply(Event $e) {
        $this->apply($e);
    }
}