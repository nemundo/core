<?php

require __DIR__.'/../config.php';

$filename='C:\Users\Urs\Downloads\demo_r_mwk_ts.tsv\demo_r_mwk_ts.tsv';


$reader=new \Nemundo\Core\Csv\Reader\CsvReader();
$reader->filename=$filename;
foreach ($reader->getData() as $csvRow) {
    (new \Nemundo\Core\Debug\Debug())->write($csvRow);
}

