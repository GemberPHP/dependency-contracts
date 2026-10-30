<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\Outbox\Rdbms;

interface RdbmsOutboxRepository
{
    /**
     * Claims and returns unprocessed outbox messages that have not been dead-lettered.
     *
     * The returned messages are claimed for this processor until a lease expires, so concurrent processors don't get
     * them; after the lease (e.g. when the processor crashed), other processors take them over. The claim must be
     * committed before returning: the messages are dispatched outside any transaction.
     *
     * @return list<RdbmsOutboxMessage>
     */
    public function getUnprocessedMessages(int $limit): array;

    public function save(RdbmsOutboxMessage $message): void;

    public function markAsProcessed(string ...$messageIds): void;

    /**
     * Increment the retry count of messages claimed by this processor, dead-letter them if maxRetries is reached, and
     * release them for a retry.
     */
    public function incrementRetryCount(int $maxRetries, string ...$messageIds): void;
}
