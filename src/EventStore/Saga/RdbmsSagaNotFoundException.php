<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Saga;

use Exception;
use Stringable;

final class RdbmsSagaNotFoundException extends Exception
{
    public static function create(string $sagaName, string|Stringable ...$sagaIds): self
    {
        return new self(sprintf(
            "Saga '%s' with id(s) %s not found in SagaStore",
            $sagaName,
            implode(', ', array_map(fn($sagaId) => (string) $sagaId, $sagaIds)),
        ));
    }
}
