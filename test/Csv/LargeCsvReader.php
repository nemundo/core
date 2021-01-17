<?php

require __DIR__ . '/../config.php';


class LargeCsvReader extends \Nemundo\Core\Csv\Reader\AbstractLargeCsvReader
{

    protected function loadReader()
    {
        $this->filename = '';
    }

    protected function onRow(\Nemundo\Core\Csv\Reader\CsvRow $csvRow)
    {

    }

}


(new LargeCsvReader())->readData();




