<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\Outbox\Rdbms;

use DateTimeImmutable;

final readonly class RdbmsOutboxMessage
{
    public function __construct(
        public string $id,
        public string $messageType,
        public string $messageName,
        public string $payload,
        public DateTimeImmutable $createdAt,
        public int $retryCount = 0,
    ) {}
}
