<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\Outbox\Rdbms;

interface RdbmsOutboxRepository
{
    /**
     * Retrieve unprocessed outbox messages that have not been dead-lettered.
     *
     * Implementations should use SELECT ... FOR UPDATE SKIP LOCKED
     * to prevent concurrent processors from picking up the same messages.
     *
     * @return list<RdbmsOutboxMessage>
     */
    public function getUnprocessedMessages(int $limit): array;

    public function save(RdbmsOutboxMessage $message): void;

    public function markAsProcessed(string ...$messageIds): void;

    /**
     * Increment the retry count and dead-letter the message if maxRetries is reached.
     */
    public function incrementRetryCount(int $maxRetries, string ...$messageIds): void;
}
