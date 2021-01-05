<?php

declare(strict_types=1);

namespace Todo;

class Metadata
{
    /** @var Timestamp */
    private $timestamp;

    /** @var Uuid */
    private $causationId;

    /** @var Uuid */
    private $correlationId;

    protected function __construct()
    {
        $this->timestamp = Timestamp::now();
    }

    public static function create(): self
    {
        return new static();
    }

    public function causationId(): Uuid
    {
        return $this->causationId;
    }

    public function correlationId(): Uuid
    {
        return $this->correlationId;
    }

    protected function setCausationId(Uuid $causationId): void
    {
        $this->causationId = $causationId;
    }

    protected function setCorrelationId(Uuid $correlationId): void
    {
        $this->correlationId = $correlationId;
    }
}