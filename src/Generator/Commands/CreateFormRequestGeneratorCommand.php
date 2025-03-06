<?php

namespace Atqiya\APIToolKit\Generator\Commands;

use Atqiya\APIToolKit\Enum\GeneratorFilesType;
use Atqiya\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Atqiya\APIToolKit\Generator\SchemaParsers\CreateValidationRulesParser;

class CreateFormRequestGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::CREATE_REQUEST;

    public function getContent(): array
    {
        return [
            '{{createValidationRules}}' => (new CreateValidationRulesParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'CreateDummyRequest';
    }
}
