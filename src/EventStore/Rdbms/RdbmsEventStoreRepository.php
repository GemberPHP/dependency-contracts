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
     * Counts the distinct events with one of the given event names and at least one of the given domain tags:
     * the number of events getEvents() returns without $afterEventId.
     *
     * @param list<string|Stringable> $domainTags
     * @param list<string> $eventNames
     */
    public function countEvents(array $domainTags, array $eventNames): int;

    /**
     * Atomically check the optimistic lock and save events.
     *
     * The optimistic lock compares the number of events matching the domain tags and event names
     * (see countEvents()) with $expectedEventCount: the number of matching events the caller based
     * its decision on. As events are append-only, any matching event committed since then changes
     * the count, regardless of its timestamp.
     *
     * Implementations must ensure that the count check and the event insert happen within the same
     * transaction, with appropriate locking to prevent concurrent writers from both passing the check.
     *
     * @param list<string|Stringable> $domainTags
     * @param list<string> $eventNames
     * @param list<RdbmsEvent> $events
     *
     * @throws OptimisticLockException
     */
    public function saveEvents(array $domainTags, array $eventNames, int $expectedEventCount, array $events): void;
}
