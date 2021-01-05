<?php

declare(strict_types=1);

namespace Todo\lib;

use Todo\Events\Event;
use Todo\Metadata;

class MetadataEnricher extends Metadata
{
    /** @var CauseHolder */
    private $causeHolder;

    public function __construct(CauseHolder $causeHolder)
    {
        parent::__construct();
        $this->causeHolder = $causeHolder;
    }

    public function enrich(Event $event): void
    {
        $cause = $this->causeHolder->getCause();
        $correlationId = $cause->metadata()->correlationId();
        $causationId = $cause->id();

        $metadata = $event->metadata();
        $metadata->setCorrelationId($correlationId);
        $metadata->setCausationId($causationId);
    }
}