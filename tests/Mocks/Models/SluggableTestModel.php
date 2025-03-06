<?php

namespace Atqiya\APIToolKit\Tests\Mocks\Models;

use Atqiya\APIToolKit\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SluggableTestModel extends Model
{
    use Sluggable;

    protected $guarded = [];

    public function testModel(): BelongsTo
    {
        return $this->belongsTo(TestModel::class);
    }
}
