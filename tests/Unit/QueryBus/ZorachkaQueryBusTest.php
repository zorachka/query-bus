<?php

declare(strict_types=1);

use Zorachka\Framework\QueryBus\QueryBus;
use Zorachka\Framework\QueryBus\ZorachkaQueryBus;
use Zorachka\Framework\Tests\Unit\QueryBus\Datasets\Fetcher;
use Zorachka\Framework\Tests\Unit\QueryBus\Datasets\Query;

test('ZorachkaQueryBus should be able to be created with array of fetchers', function () {
    $queryBus = new ZorachkaQueryBus([
        Query::class => Fetcher::class
    ]);

    expect($queryBus)->toBeInstanceOf(QueryBus::class);
});

test('ZorachkaQueryBus should be able to fetch query', function () {
    $queryBus = new ZorachkaQueryBus([
        Query::class => new Fetcher(),
    ]);

    $result = $queryBus->fetch(new Query());
    expect($result)->toBe('result');
});
