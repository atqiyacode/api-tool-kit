<?php

namespace Atqiya\APIToolKit\Tests\Mocks\Models;

use Atqiya\APIToolKit\Filters\Filterable;
use Atqiya\APIToolKit\Tests\Mocks\TestModelFilters;
use Atqiya\APIToolKit\Traits\HasActivation;
use Atqiya\APIToolKit\Traits\HasCache;
use Atqiya\APIToolKit\Traits\HasGeneratedCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestModel extends Model
{
    use Filterable;
    use HasActivation;
    use HasCache;
    use HasFactory;
    use HasGeneratedCode;

    protected string $default_filters = TestModelFilters::class;

    protected $guarded = [];

    public function sluggableTestModel(): HasMany
    {
        return $this->hasMany(SluggableTestModel::class);
    }
}
