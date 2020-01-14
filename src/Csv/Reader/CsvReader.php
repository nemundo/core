<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Csv\CsvSeperator;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

class CsvReader extends AbstractCsvReader
{

    /**
     * @var CsvSeperator
     */
    public $separator = CsvSeperator::SEMICOLON;

    /**
     * @var int
     */
    public $limit;

    /**
     * @return CsvRow[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        if (!$this->checkProperty('filename')) {
            return;
        }

        // überprüfen, ob Datei vorhanden ist
        $file = new File($this->filename);

        // bei Url funktioniert dies nicht!!!
        if (!$file->fileExists()) {
            (new LogMessage())->writeError('File ' . $this->filename . ' does not exists.');
            return;
        }


        $file = fopen($this->filename, 'r');

        // falls Header, assocatives array
        $count = 0;
        $dataHeader = [];


        while (($line = fgetcsv($file, 0, $this->separator)) !== false) {

            if ($count >= $this->lineOfStart) {

                // Clean Csv
                $data = [];
                foreach ($line as $item) {

                    if ($this->utf8Encode) {
                        $item = utf8_encode($item);
                    }

                    // Leerzeichen entfernen
                    $item = trim($item);

                    $item = trim($item, '"');
                    $item = trim($item, '﻿"');


                    $data[] = $item;

                }


                if ($this->useFirstRowAsHeader) {

                    // Header anfügen
                    if ($count == $this->lineOfStart) {
                        $dataHeader = $data;
                    } else {

                        // Daten anfügen
                        $dataNew = [];
                        $rowCount = 0;
                        foreach ($dataHeader as $rowHeader) {
                            $dataNew[trim($rowHeader)] = $data[$rowCount];
                            $rowCount++;
                        }

                        $csvRow = new CsvRow($dataNew);
                        $this->list[] = $csvRow;

                    }
                } else {

                    $this->list[] = new CsvRow($data);

                }

            }

            $count++;

        }

        fclose($file);

    }

}
