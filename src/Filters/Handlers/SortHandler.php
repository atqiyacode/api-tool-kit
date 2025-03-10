<?php

namespace Atqiya\APIToolKit\Filters\Handlers;

use Atqiya\APIToolKit\Filters\Contracts\QueryFiltersHandlerInterface;
use Atqiya\APIToolKit\Filters\DTO\QueryFiltersOptionsDTO;
use Closure;

class SortHandler implements QueryFiltersHandlerInterface
{
    public function handle(QueryFiltersOptionsDTO $queryFiltersOptionsDTO, Closure $next): QueryFiltersOptionsDTO
    {
        $sorts = $queryFiltersOptionsDTO->getFiltersDTO()->getSorts();
        $builder = $queryFiltersOptionsDTO->getBuilder();

        if (null === $sorts) {
            return $next($queryFiltersOptionsDTO);
        }

        $firstSort = explode(',', $sorts)[0];

        $value = ltrim($firstSort, '-');

        if (in_array($value, $queryFiltersOptionsDTO->getAllowedSorts())) {
            $builder->orderBy($value, $this->getDirection($firstSort));

            return $next($queryFiltersOptionsDTO);
        }

        return $next($queryFiltersOptionsDTO);
    }

    private function getDirection(string $sort): string
    {
        return str_starts_with($sort, '-') ? 'desc' : 'asc';
    }
}
