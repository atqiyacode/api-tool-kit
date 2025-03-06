<?php

namespace Atqiya\APIToolKit\Generator\ConsoleTable;

use Atqiya\APIToolKit\Generator\ApiGenerationCommandInputs;
use Atqiya\APIToolKit\Generator\Contracts\ConsoleTableInterface;
use Atqiya\APIToolKit\Generator\TableDate;

class SchemaConsoleTable implements ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate
    {
        $tableData = [];

        foreach ($apiGenerationCommandInputs->getSchema()->getColumns() as $column) {
            $tableData[] = [$column->getName(), $column->getType(), $column->getOptionsAsString()];
        }

        $headers = ['Column Name', 'Column Type', 'Options'];

        return new TableDate($headers, $tableData);
    }
}
