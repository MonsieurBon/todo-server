<?php

declare(strict_types=1);

namespace Todo\Events;

use Todo\Uuid;
use Todo\Model\User\EmailAddress;
use Todo\Model\User\UserName;

class UserWasRegistered extends Event
{
    private static $USERNAME = 'username';
    private static $EMAIL_ADDRESS = 'email_address';

    /** @var Uuid */
    private $userId;

    /** @var UserName */
    private $userName;

    /** @var EmailAddress */
    private $emailAddress;

    public static function withData(Uuid $userId, UserName $userName, EmailAddress $emailAddress): self
    {
        /** @var self $event */
        $event = self::occur($userId, [
            self::$USERNAME => $userName->toString(),
            self::$EMAIL_ADDRESS => $emailAddress->toString()
        ]);

        $event->userId = $userId;
        $event->userName = $userName;
        $event->emailAddress = $emailAddress;

        return $event;
    }

    public function userId(): Uuid
    {
        if ($this->userId === null) {
            $this->userId = $this->aggregateId();
        }

        return $this->userId;
    }

    public function userName(): UserName
    {
        if ($this->userName === null) {
            $this->userName = UserName::fromString($this->payload()[self::$USERNAME]);
        }

        return $this->userName;
    }

    public function emailAddress(): EmailAddress
    {
        if ($this->emailAddress === null) {
            $this->emailAddress = EmailAddress::fromString($this->payload()[self::$EMAIL_ADDRESS]);
        }

        return $this->emailAddress;
    }
}