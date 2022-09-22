<?php

declare(strict_types=1);

namespace Zorachka\Framework\QueryBus;

interface QueryBus
{
    /**
     * Fetch query.
     * @param object $query
     */
    public function fetch(object $query): mixed;
}
