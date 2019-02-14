<?php

declare(strict_types=1);

namespace Todo\Tests;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Todo\Uuid;

class MockUuid extends Uuid
{
    public static function fromString(string $userId): self
    {
        return new static(RamseyUuid::fromString($userId));
    }
}