<?php

declare(strict_types=1);

namespace Todo\lib;

use Todo\Events\Event;
use Todo\StreamName;

class MySqlEventStore implements EventStore
{

    public function appendTo(StreamName $streamName, array $events): void
    {
        $data[] = $this->prepareData($events);
    }

    private function prepareData(array $events): array
    {
        $data = [];

        foreach ($events as $event) {
            /** @var $event Event */
            $data[] = null;
        }
    }
}