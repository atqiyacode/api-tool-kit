<?php

namespace Atqiya\APIToolKit\Generator\Commands;

use Atqiya\APIToolKit\Enum\GeneratorFilesType;

class SeederGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::SEEDER;

    protected function getStubName(): string
    {
        return 'DummySeeder';
    }
}
