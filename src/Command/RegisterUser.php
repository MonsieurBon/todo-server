<?php

declare(strict_types=1);

namespace Todo\Command;

use Todo\Model\User\EmailAddress;
use Todo\Model\User\UserName;
use Todo\Uuid;

class RegisterUser extends Command
{
    /** @var Uuid */
    private $userId;

    /** @var UserName */
    private $userName;

    /** @var EmailAddress */
    private $emailAddress;

    public function userId(): Uuid
    {
        return $this->userId;
    }

    public function userName(): UserName
    {
        return $this->userName;
    }

    public function emailAddress(): EmailAddress
    {
        return $this->emailAddress;
    }
}