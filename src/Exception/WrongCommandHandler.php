<?php

declare(strict_types=1);

namespace Todo\Exception;

use Todo\Command\Command;

class WrongCommandHandler extends \InvalidArgumentException
{
    public static function forCommand(Command $command): self
    {
        return new static(sprintf("Wrong command handler for '%s' command", get_class($command)));
    }
}