<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Rdbms;

use Stringable;

interface RdbmsEventStoreRepository
{
    /**
     * When $afterEventId is provided, only events that occurred strictly after the
     * referenced event are returned. Ordering is by appliedAt timestamp first, then
     * by event ID for tie-breaking within the same timestamp.
     *
     * If $afterEventId references a non-existent event, implementations should return
     * an empty result set (the JOIN will produce no anchor row).
     *
     * @param list<string|Stringable> $domainTags
     * @param list<string> $eventNames
     *
     * @return list<RdbmsEvent>
     */
    public function getEvents(array $domainTags, array $eventNames, ?string $afterEventId = null): array;

    /**
     * Atomically check the optimistic lock and save events.
     *
     * Implementations must ensure that the last event ID check and the event insert
     * happen within the same transaction, with appropriate locking to prevent
     * concurrent writers from both passing the check.
     *
     * @param list<string|Stringable> $domainTags
     * @param list<string> $eventNames
     * @param list<RdbmsEvent> $events
     *
     * @throws OptimisticLockException
     */
    public function saveEvents(array $domainTags, array $eventNames, ?string $lastEventId, array $events): void;
}
