<?php

namespace Atqiya\APIToolKit\Filters\Contracts;

use Atqiya\APIToolKit\Filters\DTO\QueryFiltersOptionsDTO;
use Closure;

interface QueryFiltersHandlerInterface
{
    public function handle(QueryFiltersOptionsDTO $queryFiltersOptionsDTO, Closure $next): QueryFiltersOptionsDTO;
}
