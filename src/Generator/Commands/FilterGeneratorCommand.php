<?php

namespace Atqiya\APIToolKit\Generator\Commands;

use Atqiya\APIToolKit\Enum\GeneratorFilesType;

class FilterGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::FILTER;

    protected function getStubName(): string
    {
        return 'DummyFilters';
    }
}
