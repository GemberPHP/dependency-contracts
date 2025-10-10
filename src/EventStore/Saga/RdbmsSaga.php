<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\EventStore\Saga;

use Stringable;
use DateTimeImmutable;

final readonly class RdbmsSaga
{
    public function __construct(
        public string $sagaName,
        public string|Stringable $sagaId,
        public string $payload,
        public DateTimeImmutable $createdAt,
        public ?DateTimeImmutable $updatedAt,
    ) {}
}
