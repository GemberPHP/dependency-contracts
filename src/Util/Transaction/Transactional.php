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
}
