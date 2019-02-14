<?php

declare(strict_types=1);

namespace Todo\Model\User;

use Assert\Assertion;
use Todo\Exception\InvalidUserNameException;
use Todo\ValueObject;

class UserName implements ValueObject
{
    /** @var string */
    private $name;

    private function __construct(string $name)
    {
        try {
            Assertion::notBlank($name);
        } catch (\Exception $e) {
            throw InvalidUserNameException::reason('Invalid UserName', $e);
        }

        $this->name = $name;
    }

    public static function fromString(string $name): self
    {
        return new static($name);
    }

    public function toString(): string
    {
        return $this->name;
    }

    public function equals(ValueObject $other): bool
    {
        if (!$other instanceof UserName) {
            return false;
        }

        /** @var $other UserName */
        return $this->name === $other->name;
    }
}