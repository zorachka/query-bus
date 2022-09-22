<?php

declare(strict_types=1);

namespace Zorachka\Framework\QueryBus;

use Psr\Container\ContainerInterface;
use Zorachka\Framework\Container\ServiceProvider;

final class QueryBusServiceProvider implements ServiceProvider
{
    /**
     * @inheritDoc
     */
    public static function getDefinitions(): array
    {
        return [
            QueryBus::class => static function (ContainerInterface $container) {
                /** @var QueryBusConfig $config */
                $config = $container->get(QueryBusConfig::class);
                $fetchersMap = \array_map(function (string $fetcherClassName) use ($container) {
                    return $container->get($fetcherClassName);
                }, $config->fetchersMap());

                return new ZorachkaQueryBus($fetchersMap);
            },
            QueryBusConfig::class => static fn() => QueryBusConfig::withDefaults(),
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getExtensions(): array
    {
        return [];
    }
}
