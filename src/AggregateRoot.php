<?php

declare(strict_types=1);

namespace Todo;

use Todo\Events\Event;

abstract class AggregateRoot
{
    private $recordedEvents = [];

    protected function recordThat(Event $event): void
    {
        $this->recordedEvents[] = $event;
        $this->apply($event);
    }

    protected function apply(Event $event): void
    {
        $handler = $this->determineEventHandlerMethod($event);

        if (! \method_exists($this, $handler)) {
            throw new \RuntimeException(\sprintf(
                'Missing event handler method %s for aggregate root %s',
                $handler,
                \get_class($this)
            ));
        }

        $this->{$handler}($event);
    }

    protected function determineEventHandlerMethod(Event $event): string
    {
        return 'when' . ucfirst($event->name()->toString());
    }
}