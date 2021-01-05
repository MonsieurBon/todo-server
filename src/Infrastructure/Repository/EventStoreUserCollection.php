<?php

declare(strict_types=1);

namespace Todo\Infrastructure\Repository;

use Todo\AggregateRepository;
use Todo\Model\User\User;
use Todo\Model\User\UserCollection;
use Todo\Uuid;

class EventStoreUserCollection extends AggregateRepository implements UserCollection
{
    public function save(User $user): void
    {
        $this->saveAggregateRoot($user);
    }

    public function get(Uuid $userId): ?User
    {
        return $this->getAggregateRoot($userId);
    }

}