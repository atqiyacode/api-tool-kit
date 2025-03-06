<?php

namespace Atqiya\APIToolKit\Generator\Commands;

use Atqiya\APIToolKit\Enum\GeneratorFilesType;
use Atqiya\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Atqiya\APIToolKit\Generator\SchemaParsers\FillableColumnsParser;
use Atqiya\APIToolKit\Generator\SchemaParsers\RelationshipMethodsParser;

class ModelGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::MODEL;

    public function getContent(): array
    {
        return [
            '{{fillableColumns}}' => (new FillableColumnsParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
            '{{modelRelations}}' => (new RelationshipMethodsParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyModel';
    }
}
