<?php

namespace Atqiya\APIToolKit\Filters\Handlers;

use Atqiya\APIToolKit\Filters\Contracts\QueryFiltersHandlerInterface;
use Atqiya\APIToolKit\Filters\DTO\QueryFiltersOptionsDTO;
use Closure;

class FiltersHandler implements QueryFiltersHandlerInterface
{
    public function handle(QueryFiltersOptionsDTO $queryFiltersOptionsDTO, Closure $next): QueryFiltersOptionsDTO
    {
        $filters = $queryFiltersOptionsDTO->getFiltersDTO()->getFilters();
        $allowedFilters = $queryFiltersOptionsDTO->getAllowedFilters();
        $builder = $queryFiltersOptionsDTO->getBuilder();

        foreach ($filters as $name => $value) {
            if (in_array($name, $allowedFilters)) {
                $value = explode(',', $value);

                if (count($value) > 1) {
                    $builder->whereIn($name, $value);
                } else {
                    $builder->where($name, '=', $value[0]);
                }
            }
        }

        return $next($queryFiltersOptionsDTO);
    }
}
