<?php

namespace Atqiya\APIToolKit\Filters\Handlers;

use Atqiya\APIToolKit\Filters\Contracts\QueryFiltersHandlerInterface;
use Atqiya\APIToolKit\Filters\DTO\QueryFiltersOptionsDTO;
use Closure;

class IncludesHandler implements QueryFiltersHandlerInterface
{
    public function handle(QueryFiltersOptionsDTO $queryFiltersOptionsDTO, Closure $next): QueryFiltersOptionsDTO
    {
        $includes = array_intersect(
            $queryFiltersOptionsDTO->getFiltersDTO()->getIncludes(),
            $queryFiltersOptionsDTO->getAllowedIncludes()
        );

        $queryFiltersOptionsDTO->getBuilder()->with($includes);

        return $next($queryFiltersOptionsDTO);
    }
}
