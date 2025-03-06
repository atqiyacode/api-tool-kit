<?php

namespace Atqiya\APIToolKit\Generator\SchemaParsers;

use Atqiya\APIToolKit\Generator\ColumnDefinition;
use Atqiya\APIToolKit\Generator\SchemaDefinition;

class ResourceAttributesParser extends SchemaParser
{
    protected function getParsedSchema(SchemaDefinition $schemaDefinition): string
    {
        return collect($schemaDefinition->getColumns())
            ->map(fn(ColumnDefinition $definition): string => "'{$definition->getName()}' => {$this->value($definition)},")
            ->implode(PHP_EOL . "\t\t\t");
    }

    private function value(ColumnDefinition $definition): string
    {
        $value = "\$this->{$definition->getName()}";

        if ($definition->isDateType()) {
            return "dateTimeFormat({$value})";
        }

        return $value;
    }
}
