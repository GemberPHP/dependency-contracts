<?php

declare(strict_types=1);

namespace Gember\DependencyContracts\Util\Generator\Identity;

interface IdentityGenerator
{
    public function generate(): string;
}
