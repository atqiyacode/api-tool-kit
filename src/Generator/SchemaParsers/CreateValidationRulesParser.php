<?php

namespace Atqiya\APIToolKit\Generator\SchemaParsers;

use Atqiya\APIToolKit\Generator\ColumnDefinition;
use Atqiya\APIToolKit\Generator\Guessers\ValidationRuleGuesserInterface;
use Atqiya\APIToolKit\Generator\SchemaDefinition;

class CreateValidationRulesParser extends SchemaParser
{
    protected function getParsedSchema(SchemaDefinition $schemaDefinition): string
    {
        return collect($schemaDefinition->getColumns())
            ->map(function (ColumnDefinition $definition): string {
                $guesser = new ValidationRuleGuesserInterface($definition, ['required']);

                return "'{$definition->getName()}' => [{$guesser->guess()}],";
            })
            ->implode(PHP_EOL . "\t\t\t");
    }
}
