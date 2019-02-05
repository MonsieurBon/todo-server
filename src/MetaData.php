<?php

declare(strict_types=1);

namespace Todo\Events;

use Todo\Uuid;

class MetaData
{
    /** @var TimeStamp */
    private $timestamp;

    /** @var Uuid */
    private $causationId;

    /** @var Uuid */
    private $correlationId;

    public static function fromCause(): MetaData
    {
        return static();
    }
}