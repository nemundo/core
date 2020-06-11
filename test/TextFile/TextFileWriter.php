<?php

require '../config.php';


$file = new \Nemundo\Core\TextFile\Writer\TextFileWriter('data/file.txt');

$file->overwriteExistingFile = true;
$file->appendToExistingFile = true;
$file->addLine('hello world1');
$file->addLine('hello world2');
$file->addLine('hello world3');

$file->saveFile();