<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\Util\Messaging\MessageBus;

interface CommandBus
{
    /**
     * @throws HandlingMessageFailedException
     */
    public function handle(object $command): void;
}
