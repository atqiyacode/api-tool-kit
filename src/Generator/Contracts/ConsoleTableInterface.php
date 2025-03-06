<?php

namespace Atqiya\APIToolKit\Generator\Contracts;

use Atqiya\APIToolKit\Generator\ApiGenerationCommandInputs;
use Atqiya\APIToolKit\Generator\TableDate;

interface ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate;
}
