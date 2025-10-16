<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Saga;

use Stringable;
use DateTimeImmutable;

final readonly class RdbmsSaga
{
    /**
     * @param list<string|Stringable> $sagaIds
     */
    public function __construct(
        public string $id,
        public string $sagaName,
        public array $sagaIds,
        public string $payload,
        public DateTimeImmutable $createdAt,
        public ?DateTimeImmutable $updatedAt,
    ) {}
}
