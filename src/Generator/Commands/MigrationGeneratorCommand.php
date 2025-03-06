<?php

namespace Atqiya\APIToolKit\Generator\Commands;

use Atqiya\APIToolKit\Enum\GeneratorFilesType;
use Atqiya\APIToolKit\Generator\Contracts\HasDynamicContentInterface;
use Atqiya\APIToolKit\Generator\SchemaParsers\MigrationContentParser;

class MigrationGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::MIGRATION;

    public function getContent(): array
    {
        return [
            '{{migrationContent}}' => (new MigrationContentParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyMigration';
    }
}
