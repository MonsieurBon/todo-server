<?php

declare(strict_types=1);

namespace Todo\Command;

use Todo\Exception\WrongCommandHandler;
use Todo\Model\User\User;
use Todo\Model\User\UserCollection;

class RegisterUserHandler implements CommandHandler
{
    /** @var UserCollection */
    private $userCollection;

    public function __construct(UserCollection $userCollection)
    {
        $this->userCollection = $userCollection;
    }

    public function handle(Command $command): void
    {
        if (!$command instanceof RegisterUser) {
            throw WrongCommandHandler::forCommand($command);
        }

        $user = User::registerWithData($command->userId(), $command->userName(), $command->emailAddress());

        $this->userCollection->save($user, $command);
    }
}