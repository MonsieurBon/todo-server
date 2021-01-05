<?php

declare(strict_types=1);

namespace Todo\Model\User;

use Todo\Uuid;

interface UserCollection
{
    public function save(User $user): void;

    public function get(Uuid $userId): ?User;
}