<?php

declare(strict_types=1);

namespace Todo\Exception;

class InvalidEmailAddressException extends \InvalidArgumentException
{
    public static function reason(string $msg, \Exception $cause)
    {
        return new self($msg, 0, $cause);
    }
}