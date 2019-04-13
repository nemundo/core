<?php

require '../config.php';


$textFile = new \Nemundo\Core\File\TextFile();
$textFile->filename = 'test.log';
//$textFile->appendToExistingFile = true;
$textFile->addLine('test');


$textFile->saveFile();
