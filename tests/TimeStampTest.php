<?php

declare(strict_types=1);

namespace Todo\Tests;

use Todo\Timestamp;
use PHPUnit\Framework\TestCase;

class TimeStampTest extends TestCase
{
    public function testNow()
    {
        $timestamp = Timestamp::now();
        self::assertTrue(ctype_digit($timestamp->toString()));
    }

    public function testFromString()
    {
        $timestamp = Timestamp::fromString("1234567890");
        self::assertEquals("1234567890", $timestamp->toString());
    }

    public function testNegativeTimestamp()
    {
        $timestamp = Timestamp::fromString("-1234567890");
        self::assertEquals("-1234567890", $timestamp->toString());
    }
}
