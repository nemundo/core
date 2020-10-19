<?php

require __DIR__ . '/../config.php';


$filename = __DIR__ . '/test.csv';

$writer = new \Nemundo\Core\Csv\Writer\CsvWriter($filename);

$data = [];
$data[] = 'Line1';
$data[] = 'Line2';
$data[] = 'Line3';

$writer->addRow($data);

$writer->closeFile();
