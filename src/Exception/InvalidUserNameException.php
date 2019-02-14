<?php

declare(strict_types=1);

namespace Todo\Exception;

class InvalidUserNameException extends \InvalidArgumentException
{
    public static function reason(string $msg, \Exception $cause)
    {
        return new self($msg, 0, $cause);
    }
}