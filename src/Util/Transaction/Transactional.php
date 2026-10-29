<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\Util\Transaction;

interface Transactional
{
    /**
     * @template T
     *
     * @param callable(): T $operation
     *
     * @return T
     */
    public function transactional(callable $operation): mixed;

    /**
     * Whether a transaction is active, e.g. one opened by the application around the current operation.
     */
    public function isActive(): bool;
}
