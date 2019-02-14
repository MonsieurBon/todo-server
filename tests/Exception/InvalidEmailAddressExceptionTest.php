<?php

declare(strict_types=1);

namespace Todo\Tests\Exception;

use Todo\Exception\InvalidEmailAddressException;
use PHPUnit\Framework\TestCase;

class InvalidEmailAddressExceptionTest extends TestCase
{
    public function testCreation()
    {
        $cause = new \Exception();
        $e = InvalidEmailAddressException::reason('This is my reason', $cause);

        self::assertEquals('This is my reason', $e->getMessage());
        self::assertEquals($cause, $e->getPrevious());
        self::assertEquals(0, $e->getCode());
    }
}
