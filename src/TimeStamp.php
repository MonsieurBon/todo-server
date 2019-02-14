<?php

declare(strict_types=1);

namespace Todo;

use Assert\Assertion;

class TimeStamp
{
    /** @var int */
    private $timestamp;

    private function __construct(int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public static function now(): TimeStamp
    {
        return new static(time());
    }

    public function toString(): string
    {
        return (string)$this->timestamp;
    }

    public static function fromString(string $timestamp): TimeStamp
    {
        return new static((int) $timestamp);
    }
}