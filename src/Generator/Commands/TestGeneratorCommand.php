<?php

namespace Atqiya\APIToolKit\Generator\Commands;

use Atqiya\APIToolKit\Enum\GeneratorFilesType;

class TestGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::TEST;

    protected function getStubName(): string
    {
        return 'DummyTest';
    }
}
