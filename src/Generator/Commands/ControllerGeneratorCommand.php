<?php

namespace Atqiya\APIToolKit\Generator\Commands;

use Atqiya\APIToolKit\Enum\GeneratorFilesType;

class ControllerGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::CONTROLLER;

    protected function getStubName(): string
    {
        return 'DummyController';
    }
}
