<?php

declare(strict_types=1);

namespace Todo;

use Todo\Exception\UnsupportedOperationException;

class AggregateRootDecorator extends AggregateRoot
{
    public function extractAggregateId(AggregateRoot $aggregateRoot): Uuid
    {
        return $aggregateRoot->aggregateId();
    }

    public function extractPendingEvents(AggregateRoot $aggregateRoot): array
    {
        return $aggregateRoot->popRecordedEvents();
    }

    protected function aggregateId(): Uuid
    {
        throw new UnsupportedOperationException(sprintf('Method %s should not be called on class %s.', __METHOD__, static::class));
    }
}