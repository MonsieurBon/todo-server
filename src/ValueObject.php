<?php

declare(strict_types=1);

namespace Todo;


interface ValueObject
{
    public function equals(ValueObject $other): bool;
}