<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Saga;

use Exception;
use Stringable;

final class RdbmsSagaNotFoundException extends Exception
{
    public static function withSagaId(string $sagaName, string|Stringable $sagaId): self
    {
        return new self(sprintf("Saga '%s' with id %s not found in SagaStore", $sagaName, $sagaId));
    }
}
