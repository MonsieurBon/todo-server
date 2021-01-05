<?php

declare(strict_types=1);

namespace Todo\Command;

interface CommandHandler
{
    public function handle(Command $command): void;
}