<?php

declare(strict_types=1);

namespace Todo;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Ramsey\Uuid\UuidInterface;

class Uuid implements ValueObject
{
    private $uuid;

    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public static function fromString(string $uuid): Uuid
    {
        return new static(RamseyUuid::fromString($uuid));
    }

    public static function generate(): Uuid
    {
        return new static(RamseyUuid::uuid4());
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }

    public function equals(ValueObject $other): bool
    {
        if (!$other instanceof Uuid) {
            return false;
        }

        return $this->uuid->equals($other->uuid);
    }
}