<?php

namespace Atqiya\APIToolKit\Tests\database\factories;

use Atqiya\APIToolKit\Tests\Mocks\Models\TestModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestModelFactory extends Factory
{
    protected $model = TestModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
