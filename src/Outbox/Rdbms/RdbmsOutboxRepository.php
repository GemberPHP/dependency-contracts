<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\Outbox\Rdbms;

interface RdbmsOutboxRepository
{
    /**
     * Claims and returns unprocessed outbox messages that have not been dead-lettered.
     *
     * The returned messages are claimed for this processor until a lease expires, so concurrent processors don't get
     * them; after the lease (e.g. when the processor crashed), other processors take them over. Called outside any
     * transaction (as processors should be), the claim is committed before returning, and the messages are dispatched
     * outside a transaction. Messages waiting for a retry (after a failed dispatch) aren't returned before it's due.
     *
     * @return list<RdbmsOutboxMessage>
     */
    public function getUnprocessedMessages(int $limit): array;

    public function save(RdbmsOutboxMessage $message): void;

    public function markAsProcessed(string ...$messageIds): void;

    /**
     * Increment the retry count of messages claimed by this processor that aren't processed, and release them for a
     * retry after a backoff. They're dead-lettered after the first attempt and maxRetries retries (when the retry count
     * exceeds maxRetries).
     */
    public function incrementRetryCount(int $maxRetries, string ...$messageIds): void;
}
