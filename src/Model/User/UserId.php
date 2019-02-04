<?php

declare(strict_types=1);

namespace Todo\Model\User;

use Todo\Uuid;
use Todo\ValueObject;

class UserId extends Uuid
{
    public function equals(ValueObject $other): bool
    {
        if (!$other instanceof UserId) {
            return false;
        }

        /** @var UserId $other */
        return parent::equals($other);
    }
}