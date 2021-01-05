<?php

declare(strict_types=1);

namespace Todo;

use Todo\Events\Event;
use Todo\lib\EventStore;
use Todo\lib\MetadataEnricher;

class AggregateRepository
{
    /** @var AggregateRootDecorator */
    private $aggregateRootDecorator;

    /** @var EventStore */
    private $eventStore;

    /** @var MetadataEnricher */
    private $metadataEnricher;

    /** @var StreamName */
    private $streamName;

    public function __construct(
        AggregateRootDecorator $aggregateRootDecorator,
        EventStore $eventStore,
        MetadataEnricher $metadataEnricher,
        StreamName $streamName
    )
    {
        $this->aggregateRootDecorator = $aggregateRootDecorator;
        $this->eventStore = $eventStore;
        $this->metadataEnricher = $metadataEnricher;
        $this->streamName = $streamName;
    }

    protected function saveAggregateRoot(AggregateRoot $aggregateRoot): void
    {
        $events = $this->aggregateRootDecorator->extractPendingEvents($aggregateRoot);
        $aggregateId = $this->aggregateRootDecorator->extractAggregateId($aggregateRoot);
        $streamName = $this->determineStreamName();

        foreach ($events as $event) {
            $this->metadataEnricher->enrich($event);
        }

        $this->eventStore->appendTo($streamName, $events);
    }

    protected function getAggregateRoot(Uuid $aggregateId): AggregateRoot
    {

    }

    private function determineStreamName(): StreamName
    {
        return $this->streamName;
    }

    private function enrichMetadata(Event $event)
    {
        $cause = $this->metadataEnricher->getCause();
    }
}