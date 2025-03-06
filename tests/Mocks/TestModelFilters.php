<?php

namespace Atqiya\APIToolKit\Tests\Mocks;

use Atqiya\APIToolKit\Filters\QueryFilters;
use Atqiya\APIToolKit\Traits\DateFilter;
use Atqiya\APIToolKit\Traits\TimeFilter;

class TestModelFilters extends QueryFilters
{
    use DateFilter;
    use TimeFilter;

    protected array $columnSearch = ['name'];

    protected array $allowedFilters = ['id'];

    protected array $allowedSorts = ['created_at', 'name'];

    protected array $allowedIncludes = ['sluggableTestModel'];

    protected array $relationSearch = [
        'sluggableTestModel' => ['name'],
    ];

    public function year($term): void
    {
        $this->builder->whereYear('created_at', $term);
    }
}
