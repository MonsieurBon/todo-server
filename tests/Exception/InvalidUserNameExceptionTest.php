<?php

declare(strict_types=1);

namespace Todo\Tests\Exception;

use PHPUnit\Framework\TestCase;
use Todo\Exception\InvalidUserNameException;

class InvalidUserNameExceptionTest extends TestCase
{
    public function testCreation()
    {
        $cause = new \Exception();
        $e = InvalidUserNameException::reason('This is my reason', $cause);

        self::assertEquals('This is my reason', $e->getMessage());
        self::assertEquals($cause, $e->getPrevious());
        self::assertEquals(0, $e->getCode());
    }
}
