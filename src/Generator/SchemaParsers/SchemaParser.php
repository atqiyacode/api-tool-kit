<?php

namespace Atqiya\APIToolKit\Generator\SchemaParsers;

use Atqiya\APIToolKit\Generator\SchemaDefinition;

abstract class SchemaParser
{
    public function __construct(private SchemaDefinition $schema)
    {
    }

    public function parse(): string
    {
        if (empty($this->schema->getColumns())) {
            return '';
        }

        return $this->getParsedSchema($this->schema);
    }

    abstract protected function getParsedSchema(SchemaDefinition $schemaDefinition): string;
}
