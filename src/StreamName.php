<?php

declare(strict_types=1);

namespace Todo;

use Assert\Assertion;
use Todo\Exception\InvalidStreamNameException;

class StreamName implements ValueObject
{
    /** @var string */
    private $name;

    private function __construct(string $name)
    {
        try {
            Assertion::notBlank($name);
        } catch (\Exception $e) {
            throw InvalidStreamNameException::reason('Invalid StreamName', $e);
        }

        $this->name = $name;
    }

    public static function fromString(string $name): StreamName
    {
        return new static($name);
    }

    public function toString(): string
    {
        return $this->name;
    }

    public function equals(ValueObject $other): bool
    {
        if (!$other instanceof StreamName) {
            return false;
        }

        return $this->name === $other->name;
    }
}