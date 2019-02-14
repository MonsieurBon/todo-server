<?php

declare(strict_types=1);

namespace Todo;


abstract class DomainMessage
{
    /** @var Uuid */
    private $id;

    /** @var MetaData */
    private $metadata;

    protected function __construct(Uuid $id)
    {
        $this->id = $id;
        $this->metadata = MetaData::create();
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function metadata(): MetaData
    {
        return $this->metadata;
    }
}