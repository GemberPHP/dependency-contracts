<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Saga;

use Exception;
use Throwable;

final class RdbmsSagaConcurrencyException extends Exception
{
    public static function create(?Throwable $previous = null): self
    {
        return new self('Saga concurrency: saga is already changed', 0, $previous);
    }
}
