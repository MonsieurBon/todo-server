<?php

declare(strict_types=1);

namespace Todo\Command;

class CommandHandlerFactory
{
    private $map;

    public function __construct(array $map)
    {
        $this->map = $map;
    }

    public function getCommandHandler(string $commandClass): CommandHandler
    {
        return $this->map[$commandClass];
    }
}