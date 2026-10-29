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
     * Saves the saga. $previous is the saga as it was loaded (or last saved), null for a new saga: the save only
     * succeeds while the stored saga is still at its revision.
     *
     * A saga id value belongs to at most one saga per saga name.
     *
     * @throws RdbmsSagaConcurrencyException when the saga was changed concurrently, or a saga id of a new saga is
     *                                       taken (created concurrently: reloading finds it) (retryable)
     * @throws RdbmsSagaIdAlreadyInUseException when a saga id added to an existing saga already belongs to another
     *                                          saga (not retryable)
     */
    public function save(
        string $sagaName,
        string $payload,
        DateTimeImmutable $now,
        ?RdbmsSaga $previous,
        string|Stringable ...$sagaIds,
    ): RdbmsSaga;
}
