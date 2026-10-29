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
    public function get(string $sagaName, string|Stringable ...$sagaIds): RdbmsSaga;

    /**
     * Saves the saga, provided it is still at $expectedRevision: the revision it was loaded with (null for a new saga).
     * Saga ids are unique per saga name.
     *
     * @throws RdbmsSagaConcurrencyException when the saga was changed or created concurrently, or a saga id already
     *                                       belongs to another saga
     */
    public function save(
        string $sagaName,
        string $payload,
        DateTimeImmutable $now,
        ?int $expectedRevision,
        string|Stringable ...$sagaIds,
    ): RdbmsSaga;
}
