<?php

declare(strict_types=1);

namespace Todo\Model\User;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Todo\Uuid;
use Todo\ValueObject;

class UserId extends Uuid
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
        if (!$other instanceof UserId) {
            return false;
        }

        /** @var UserId $other */
        return parent::equals($other);
    }
}