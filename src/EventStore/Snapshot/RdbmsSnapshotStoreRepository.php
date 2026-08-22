<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Snapshot;

use Stringable;

interface RdbmsSnapshotStoreRepository
{
    /**
     * @param list<string|Stringable> $domainTags
     * @param list<string> $eventNames
     */
    public function get(array $domainTags, array $eventNames): ?RdbmsSnapshot;

    public function save(RdbmsSnapshot $snapshot): void;
}
