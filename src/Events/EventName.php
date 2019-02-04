<?php

declare(strict_types=1);

namespace Todo\Events;

use Todo\ValueObject;

class EventName implements ValueObject
{
    private $name;

    public static function fromString(string $name): EventName
    {
        return new self($name);
    }

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public function toString(): string
    {
        return $this->name;
    }

    public function equals(ValueObject $other): bool
    {
        if (!$other instanceof EventName) {
            return false;
        }

        /** @var EventName $other */
        return $other->name === $this->name;
    }
}