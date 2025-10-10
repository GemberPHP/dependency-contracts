<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Saga;

use Stringable;
use DateTimeImmutable;

interface RdbmsSagaStoreRepository
{
    /**
     * @throws RdbmsSagaNotFoundException
     */
    public function get(string $sagaName, string|Stringable $sagaId): RdbmsSaga;

    public function save(
        string $sagaName,
        string|Stringable $sagaId,
        string $payload,
        DateTimeImmutable $now,
    ): RdbmsSaga;
}
