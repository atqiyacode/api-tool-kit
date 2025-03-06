<?php

namespace Atqiya\APIToolKit\Generator\ConsoleTable;

use Atqiya\APIToolKit\Generator\ApiGenerationCommandInputs;
use Atqiya\APIToolKit\Generator\Configs\PathConfigHandler;
use Atqiya\APIToolKit\Generator\Contracts\ConsoleTableInterface;
use Atqiya\APIToolKit\Generator\TableDate;

class GeneratedFilesConsoleTable implements ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate
    {
        $tableData = $this->generateTableData($apiGenerationCommandInputs);

        $headers = ['Type', 'File Path'];

        return new TableDate($headers, $tableData);
    }

    private function generateTableData(ApiGenerationCommandInputs $apiGenerationCommandInputs): array
    {
        $configForPathGroup = PathConfigHandler::getFileInfoForAllTypes(
            pathGroupName: $apiGenerationCommandInputs->getPathGroup(),
            modelName: $apiGenerationCommandInputs->getModel()
        );

        $tableData = [];

        foreach ($configForPathGroup as $type => $generatedFileInfo) {
            if ($apiGenerationCommandInputs->isOptionSelected($type)) {
                $tableData[] = [
                    $type,
                    $generatedFileInfo->getFullPath(),
                ];
            }
        }

        return $tableData;
    }
}
