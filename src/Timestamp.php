<?php

declare(strict_types=1);

namespace Todo;

class Timestamp
{
    /** @var int */
    private $timestamp;

    private function __construct(int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public static function now(): Timestamp
    {
        return new static(time());
    }

    public function toString(): string
    {
        return (string)$this->timestamp;
    }

    public static function fromString(string $timestamp): Timestamp
    {
        return new static((int) $timestamp);
    }
}