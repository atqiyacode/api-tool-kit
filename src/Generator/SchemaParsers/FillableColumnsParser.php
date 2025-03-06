<?php

namespace Atqiya\APIToolKit\Generator\SchemaParsers;

use Atqiya\APIToolKit\Generator\ColumnDefinition;
use Atqiya\APIToolKit\Generator\SchemaDefinition;

class FillableColumnsParser extends SchemaParser
{
    protected function getParsedSchema(SchemaDefinition $schemaDefinition): string
    {
        return collect($schemaDefinition->getColumns())
            ->map(fn(ColumnDefinition $definition): string => "'{$definition->getName()}',")
            ->implode(PHP_EOL . "\t\t");
    }
}
