<?php

declare(strict_types=1);

namespace Todo;

use Ramsey\Uuid\Uuid as RamseyUuid;
use Ramsey\Uuid\UuidInterface;
use Todo\Model\User\UserId;

abstract class Uuid implements ValueObject
{
    private $uuid;

    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public static function fromString(string $userId): Uuid
    {
        return new static(RamseyUuid::fromString($userId));
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

        /** @var UserId $other */
        return $this->uuid->equals($other->uuid);
    }
}