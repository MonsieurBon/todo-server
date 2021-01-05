<?php

declare(strict_types=1);

namespace Todo\lib;


use Todo\StreamName;

interface EventStore
{
    public function appendTo(StreamName $streamName, array $events): void;
}