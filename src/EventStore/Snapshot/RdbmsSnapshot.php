<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Snapshot;

use DateTimeImmutable;

final readonly class RdbmsSnapshot
{
    /**
     * @param list<string> $domainTags
     * @param list<string> $eventNames
     */
    public function __construct(
        public array $domainTags,
        public array $eventNames,
        public string $lastEventId,
        public int $eventCount,
        public string $payload,
        public DateTimeImmutable $createdAt,
    ) {}
}
