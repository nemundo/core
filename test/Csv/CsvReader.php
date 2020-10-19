<?php

require __DIR__ . '/../config.php';

$filename = '';

$reader = new \Nemundo\Core\Csv\Reader\CsvReader();
$reader->filename = $filename;
foreach ($reader->getData() as $csvRow) {
    (new \Nemundo\Core\Debug\Debug())->write($csvRow);
}

