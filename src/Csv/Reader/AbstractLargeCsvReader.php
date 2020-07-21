<?php


namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Csv\CsvSeperator;

abstract class AbstractLargeCsvReader extends AbstractBase
{

    use CsvTrait;

    /**
     * @var CsvSeperator
     */
    public $separator = CsvSeperator::SEMICOLON;

    protected $header=[];

    protected $count=0;

    private $loadReader = false;

    private $numberOfLines;

    /**
     * @var int
     */
    public $limit;

    abstract protected function loadReader();

    abstract protected function onRow(CsvRow $csvRow);



    protected function getCount() {

        return $this->count;

    }


    protected function onHeader() {

    }

    protected function onFinished() {

    }


    public function readData() {


        if (!$this->loadReader) {
        $this->loadReader();
$this->loadReader=true;
        }

        $file = fopen($this->filename, 'r');

        //$count = 0;
        //$dataHeader = [];
        while (($line = fgetcsv($file, 0, $this->separator)) !== false) {

            if ($this->count >= $this->lineOfStart) {

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
                    if ($this->count == $this->lineOfStart) {
                        $this->header = $data;
                        $this->onHeader();


                    } else {

                        // Daten anfügen
                        $dataNew = [];
                        $rowCount = 0;
                        foreach ($this->header as $rowHeader) {
                            $dataNew[trim($rowHeader)] = $data[$rowCount];
                            $rowCount++;
                        }

                        //$csvRow = new CsvRow($dataNew);
                        //$this->list[] = $csvRow;

                        $csvRow = new CsvRow($dataNew);
                        $this->onRow($csvRow);

                    }

                } else {

                    //$this->list[] = new CsvRow($data);

                    $csvRow = new CsvRow($data);
                    $this->onRow($csvRow);

                }


                if ($this->limit !==null) {

                    if ($this->getCount() ===$this->limit) {
                        $this->onFinished();
                        return;

                    }

                }


            }

            $this->count++;

        }

        $this->onFinished();

    }


    public function getNumberOfLines() {


        if ($this->numberOfLines===null) {

        //$this->loadReader();

            if (!$this->loadReader) {
                $this->loadReader();
                $this->loadReader=true;
            }

        /*
        $linecount = 0;
        $handle = fopen($this->filename, 'r');
        while(!feof($handle)) {
            fgets($handle);
            $linecount++;
        }

        fclose($handle);*/

        $f = fopen($this->filename, 'rb');
        $this->numberOfLines = 0;

        while (!feof($f)) {
            $this->numberOfLines += substr_count(fread($f, 8192), "\n");
        }

        fclose($f);

        }

        return $this->numberOfLines;

    }

}