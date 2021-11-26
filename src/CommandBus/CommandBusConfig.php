<?php

declare(strict_types=1);

namespace Zorachka\Framework\CommandBus;

final class CommandBusConfig
{
    private array $handlersMap;

    private function __construct(array $handlersMap)
    {
        $this->handlersMap = $handlersMap;
    }

    public static function withDefaults(array $handlersMap = []): self
    {
        return new self($handlersMap);
    }

    /**
     * @param class-string $commandClassName
     * @param class-string $handlerClassName
     * @return $this
     */
    public function withHandlerFor(string $commandClassName, string $handlerClassName): self
    {
        $new = clone $this;
        $new->handlersMap[$commandClassName] = $handlerClassName;

        return $new;
    }

    /**
     * @return array
     */
    public function handlersMap(): array
    {
        return $this->handlersMap;
    }
}
