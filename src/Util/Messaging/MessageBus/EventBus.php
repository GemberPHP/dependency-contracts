<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\Util\Messaging\MessageBus;

interface EventBus
{
    /**
     * @throws HandlingMessageFailedException
     */
    public function handle(object $event): void;
}
