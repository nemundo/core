<?php

require __DIR__.'/../config.php';

$filename = __DIR__.'/data/test.log';
$filename = false;

$file = new \Nemundo\Core\TextFile\Writer\TextFileWriter($filename);
$file->overwriteExistingFile=true;

//$textFile = new \Nemundo\Core\File\TextFileWr();
//$textFile->filename = 'test.log';
//$textFile->appendToExistingFile = true;
$file->addLine('test');

$file->saveFile();
