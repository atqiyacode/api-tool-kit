<?php

use Atqiya\APIToolKit\Enum\GeneratorFilesType;

return [
    /*
    |--------------------------------------------------------------------------
    | API Generators Commands
    |--------------------------------------------------------------------------
    |
    | Define API generator commands.
    |
    */
    'api_generator_commands' => [
        GeneratorFilesType::MODEL => Atqiya\APIToolKit\Generator\Commands\ModelGeneratorCommand::class,
        GeneratorFilesType::FACTORY => Atqiya\APIToolKit\Generator\Commands\FactoryGeneratorCommand::class,
        GeneratorFilesType::SEEDER => Atqiya\APIToolKit\Generator\Commands\SeederGeneratorCommand::class,
        GeneratorFilesType::CONTROLLER => Atqiya\APIToolKit\Generator\Commands\ControllerGeneratorCommand::class,
        GeneratorFilesType::RESOURCE => Atqiya\APIToolKit\Generator\Commands\ResourceGeneratorCommand::class,
        GeneratorFilesType::TEST => Atqiya\APIToolKit\Generator\Commands\TestGeneratorCommand::class,
        GeneratorFilesType::CREATE_REQUEST => Atqiya\APIToolKit\Generator\Commands\CreateFormRequestGeneratorCommand::class,
        GeneratorFilesType::UPDATE_REQUEST => Atqiya\APIToolKit\Generator\Commands\UpdateFormRequestGeneratorCommand::class,
        GeneratorFilesType::FILTER => Atqiya\APIToolKit\Generator\Commands\FilterGeneratorCommand::class,
        GeneratorFilesType::MIGRATION => Atqiya\APIToolKit\Generator\Commands\MigrationGeneratorCommand::class,
        GeneratorFilesType::ROUTES => Atqiya\APIToolKit\Generator\Commands\RoutesGeneratorCommand::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    |
    | Specify the list of handler classes for processing query filters.
    | These handlers will be applied in the specified order.
    */
    'filters' => [
        'handlers' => [
            Atqiya\APIToolKit\Filters\Handlers\FiltersHandler::class,
            Atqiya\APIToolKit\Filters\Handlers\SortHandler::class,
            Atqiya\APIToolKit\Filters\Handlers\IncludesHandler::class,
            Atqiya\APIToolKit\Filters\Handlers\SearchHandler::class,
        ],
    ],
];
