<?php

declare(strict_types=1);

namespace Todo\Command;

class RequestClassResolver
{
    private $map;

    public function __construct(array $map)
    {
        $this->map = $map;
    }

    public function getCommandClass(string $commandName): string
    {
        return $this->map[$commandName];
    }
}