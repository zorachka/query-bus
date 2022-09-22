<?php

declare(strict_types=1);

namespace Zorachka\Framework\QueryBus;

final class ZorachkaQueryBus implements QueryBus
{
    /**
     * @param array<class-string, callable> $fetchersMap
     */
    public function __construct(private array $fetchersMap)
    {
    }

    /**
     * @inheritDoc
     */
    public function fetch(object $query): mixed
    {
        $fetcher = $this->fetchersMap[$query::class];

        return $fetcher($query);
    }
}
