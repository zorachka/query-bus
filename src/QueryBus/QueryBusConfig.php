<?php

declare(strict_types=1);

namespace Zorachka\Framework\QueryBus;

use Webmozart\Assert\Assert;

final class QueryBusConfig
{
    private array $fetchersMap;

    private function __construct(array $handlersMap)
    {
        $this->fetchersMap = $handlersMap;
    }

    public static function withDefaults(
        array $fetchersMap = [],
    ): self {
        return new self($fetchersMap);
    }

    /**
     * @param class-string $queryClassName
     * @param class-string $fetcherClassName
     * @return $this
     */
    public function withFetcherFor(string $queryClassName, string $fetcherClassName): self
    {
        Assert::notEmpty($queryClassName);
        Assert::notEmpty($fetcherClassName);
        $new = clone $this;
        $new->fetchersMap[$queryClassName] = $fetcherClassName;

        return $new;
    }

    /**
     * @return array
     */
    public function fetchersMap(): array
    {
        return $this->fetchersMap;
    }
}
