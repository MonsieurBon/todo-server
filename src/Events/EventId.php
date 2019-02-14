<?php

declare(strict_types=1);

namespace Todo\Events;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Todo\Uuid;
use Todo\ValueObject;

class EventId extends Uuid
{
    public static function fromString(string $userId): self
    {
        return new static(RamseyUuid::fromString($userId));
    }

    public static function generate(): self
    {
        return new static(RamseyUuid::uuid4());
    }

    public function equals(ValueObject $other): bool
    {
        if (!$other instanceof EventId) {
            return false;
        }

        return parent::equals($other);
    }

}