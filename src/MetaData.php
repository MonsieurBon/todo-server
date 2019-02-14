<?php

declare(strict_types=1);

namespace Todo;

class MetaData
{
    /** @var TimeStamp */
    private $timestamp;

    /** @var Uuid */
    private $causationId;

    /** @var Uuid */
    private $correlationId;

    private function __construct()
    {
        $this->timestamp = TimeStamp::now();
    }

    public static function create(): self
    {
        return new static();
    }
}