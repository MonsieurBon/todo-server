<?php

declare(strict_types=1);

namespace Todo;

use Ramsey\Uuid\UuidInterface;

abstract class Uuid implements ValueObject
{
    private $uuid;

    protected function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }

    public function equals(ValueObject $other): bool
    {
        /** @var Uuid $other */
        return $this->uuid->equals($other->uuid);
    }
}