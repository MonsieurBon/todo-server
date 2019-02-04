<?php

declare(strict_types=1);

namespace Todo\Events;

use Todo\Uuid;
use Todo\ValueObject;

class EventId extends Uuid
{
    public function equals(ValueObject $other): bool
    {
        if (!$other instanceof EventId) {
            return false;
        }

        return parent::equals($other);
    }

}