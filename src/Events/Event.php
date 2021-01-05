<?php

declare(strict_types=1);

namespace Todo\Events;

use Todo\DomainMessage;
use Todo\Uuid;

abstract class Event extends DomainMessage
{
    /** @var EventName */
    private $name;

    /** @var Uuid */
    private $aggregateId;

    /** @var array */
    private $payload;

    private function __construct(Uuid $aggregateId, array $payload)
    {
        parent::__construct(Uuid::generate());
        $this->name = EventName::fromString((new \ReflectionClass($this))->getShortName());
        $this->aggregateId = $aggregateId;
        $this->payload = $payload;
    }

    protected static function occur(Uuid $aggregateId, array $payload = []): self
    {
        return new static($aggregateId, $payload);
    }

    public function name(): EventName
    {
        return $this->name;
    }

    public function aggregateId(): Uuid
    {
        return $this->aggregateId;
    }

    public function payload(): array
    {
        return $this->payload;
    }
}