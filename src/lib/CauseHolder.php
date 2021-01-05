<?php

declare(strict_types=1);

namespace Todo\lib;

use Todo\DomainMessage;

class CauseHolder
{
    /** @var DomainMessage */
    private $cause;

    public function getCause(): DomainMessage
    {
        return $this->cause;
    }

    public function setCause(DomainMessage $cause): void
    {
        $this->cause = $cause;
    }
}