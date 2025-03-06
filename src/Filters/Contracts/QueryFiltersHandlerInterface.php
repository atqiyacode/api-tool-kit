<?php

namespace Atqiya\APIToolKit\Filters\Contracts;

use Closure;
use Atqiya\APIToolKit\Filters\DTO\QueryFiltersOptionsDTO;

interface QueryFiltersHandlerInterface
{
    public function handle(QueryFiltersOptionsDTO $queryFiltersOptionsDTO, Closure $next): QueryFiltersOptionsDTO;
}
