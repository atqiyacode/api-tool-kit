<?php

namespace Atqiya\APIToolKit\Tests;

use Atqiya\APIToolKit\Tests\Mocks\Models\TestModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DateFilterTest extends TestCase
{
    /**
     * @test
     */
    public function useDateFilterToFilterFromDate(): void
    {
        TestModel::factory(5)->create([
            'created_at' => Carbon::parse('2023-08-01 12:00:00'),
        ]);
        TestModel::factory(3)->create([
            'created_at' => Carbon::parse('2023-08-02 14:00:00'),
        ]);

        $this->app->bind('request', fn () => new Request([
            'from_date' => '2023-08-02',
        ]));

        $records = TestModel::useFilters()->get();

        $this->assertCount(3, $records);
    }

    /**
     * @test
     */
    public function useDateFilterToFilterToDate(): void
    {
        TestModel::factory(5)->create([
            'created_at' => Carbon::parse('2023-08-01 12:00:00'),
        ]);
        TestModel::factory(3)->create([
            'created_at' => Carbon::parse('2023-08-02 14:00:00'),
        ]);

        $this->app->bind('request', fn () => new Request([
            'to_date' => '2023-08-01',
        ]));

        $records = TestModel::useFilters()->get();

        $this->assertCount(5, $records);
    }

    /**
     * @test
     */
    public function useDateFilterWithBothFromDateAndToDate(): void
    {
        // Arrange
        TestModel::factory(5)->create([
            'created_at' => Carbon::parse('2023-08-01 12:00:00'),
        ]);
        TestModel::factory(3)->create([
            'created_at' => Carbon::parse('2023-08-02 14:00:00'),
        ]);

        $this->app->bind('request', fn () => new Request([
            'from_date' => '2023-08-01',
            'to_date' => '2023-08-01',
        ]));

        // Act
        $records = TestModel::useFilters()->get();

        // Assert
        $this->assertCount(5, $records);
    }

    /**
     * @test
     */
    public function useDateAndTimeFiltersTogether(): void
    {
        TestModel::factory(5)->create([
            'created_at' => Carbon::parse('2023-08-01 12:00:00'),
        ]);
        TestModel::factory(3)->create([
            'created_at' => Carbon::parse('2023-08-02 14:00:00'),
        ]);

        $this->app->bind('request', fn () => new Request([
            'from_date' => '2023-08-01',
            'to_date' => '2023-08-01',
            'from_time' => '11:00:00',
            'to_time' => '13:00:00',
        ]));

        $records = TestModel::useFilters()->get();

        $this->assertCount(5, $records);
    }
}
