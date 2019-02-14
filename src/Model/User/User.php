<?php

declare(strict_types=1);

namespace Todo\Model\User;

use Todo\AggregateRoot;
use Todo\Events\UserWasRegistered;

class User extends AggregateRoot
{
    /** @var UserId */
    private $userId;

    /** @var UserName */
    private $userName;

    /** @var EmailAddress */
    private $emailAddress;

    public static function registerWithData(UserId $userId, UserName $userName, EmailAddress $emailAddress)
    {
        $self = new self();

        $self->recordThat(UserWasRegistered::withData($userId, $userName, $emailAddress));

        return $self;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    /** @noinspection PhpUnusedPrivateMethodInspection */
    protected function whenUserWasRegistered(UserWasRegistered $event): void
    {
        $this->userId = $event->userId();
        $this->userName = $event->userName();
        $this->emailAddress = $event->emailAddress();
    }
}