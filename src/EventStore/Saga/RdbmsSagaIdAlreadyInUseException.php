<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Saga;

use Exception;
use Stringable;
use Throwable;

final class RdbmsSagaIdAlreadyInUseException extends Exception
{
    public static function create(string $sagaName, string|Stringable $sagaId, ?Throwable $previous = null): self
    {
        return new self(sprintf('Saga id %s already belongs to another saga %s', $sagaId, $sagaName), 0, $previous);
    }
}
