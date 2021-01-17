<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Csv\CsvSeperator;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;


// Ableitung von AbstractLargeCsvReader
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



    /*
    public function getHeaderByNumber($number) {


        if (isset())

        $label = $this->getHeader()[$number];

        return $label;

    }*/


    protected function loadData()
    {

        if (!$this->checkProperty('filename')) {
            return;
        }


        $this->checkFileExists();

        // überprüfen, ob Datei vorhanden ist
        /*$file = new File($this->filename);

        // bei Url funktioniert dies nicht!!!
        if (!$file->fileExists()) {
            (new LogMessage())->writeError('File ' . $this->filename . ' does not exists.');
            exit;
        }*/

        $file = fopen($this->filename, 'r');

        $count = 0;
        //$dataHeader = [];
        while (($line = fgetcsv($file, 0, $this->separator)) !== false) {

            if ($count >= $this->lineOfStart) {

                // Clean Csv
                $data = [];
                foreach ($line as $item) {

                    if ($this->utf8Encode) {
                        $item = utf8_encode($item);
                    }

                    $item = trim($item);
                    $item = trim($item, '"');
                    $item = trim($item, '﻿"');

                    $data[] = $item;

                }


                if ($this->useFirstRowAsHeader) {

                    // Header anfügen
                    if ($count == $this->lineOfStart) {
                        $this->header = $data;
                    } else {

                        // Daten anfügen
                        $dataNew = [];
                        $rowCount = 0;
                        foreach ($this->header as $rowHeader) {

                            if (isset($data[$rowCount])) {
                            $dataNew[trim($rowHeader)] = $data[$rowCount];
                            } else {
                                $dataNew[trim($rowHeader)]='';
                            }

                            $rowCount++;
                        }

                        $csvRow = new CsvRow($dataNew);
                        //$this->list[] = $csvRow;
                        $this->addItem($csvRow);

                    }

                } else {

                    //$this->list[] = new CsvRow($data);
                    $this->addItem(new CsvRow($data));

                }

            }

            $count++;

            if ($this->limit !==null) {

                if ($count>$this->limit) {
                   return;
                }

            }

        }

        fclose($file);

    }

}
