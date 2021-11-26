<?php

declare(strict_types=1);

namespace Zorachka\Framework\CommandBus;

interface CommandBus
{
    /**
     * Handle command.
     * @param object $command
     */
    public function handle(object $command);
}
