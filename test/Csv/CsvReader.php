<?php

require __DIR__ . '/../config.php';

$filename = '';

$reader = new \Nemundo\Core\Csv\Reader\CsvReader();
$reader->filename = $filename;

(new \Nemundo\Core\Debug\Debug())->write($reader->getHeader());
(new \Nemundo\Core\Debug\Debug())->write($reader->getHeaderByNumber(0));

foreach ($reader->getData() as $csvRow) {
    (new \Nemundo\Core\Debug\Debug())->write($csvRow);
}

