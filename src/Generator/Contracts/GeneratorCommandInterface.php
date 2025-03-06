<?php

namespace Atqiya\APIToolKit\Generator\Contracts;

use Atqiya\APIToolKit\Generator\ApiGenerationCommandInputs;

interface GeneratorCommandInterface
{
    public function run(ApiGenerationCommandInputs $apiGenerationCommandInputs): void;
}
