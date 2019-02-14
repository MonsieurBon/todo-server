<?php

declare(strict_types=1);

namespace Todo\Model\User;

use Assert\Assertion;
use Todo\Exception\InvalidEmailAddressException;
use Todo\ValueObject;

class EmailAddress implements ValueObject
{
    /** @var string */
    private $email;

    private function __construct(string $email)
    {
        try {
            Assertion::email($email);
        } catch (\Exception $e) {
            throw InvalidEmailAddressException::reason('Invalid Email', $e);
        }

        $this->email = $email;
    }

    public static function fromString(string $email): self
    {
        return new static($email);
    }

    public function toString(): string
    {
        return $this->email;
    }

    public function equals(ValueObject $other): bool
    {
        if (!$other instanceof EmailAddress) {
            return false;
        }

        /** @var $email EmailAddress */
        return $this->email === $other->email;
    }
}