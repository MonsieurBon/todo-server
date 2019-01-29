<?php

declare(strict_types=1);

namespace Todo\Tests;

use PHPUnit\Framework\TestCase;
use Todo\Dummy;

class DummyTest extends TestCase
{
    public function testGetDummy() {
        self::assertTrue(Dummy::getTrue());
    }
}