<?php

require '../config.php';


$file = new \Nemundo\Core\TextFile\Writer\LargeTextFileWriter('data/large_file.txt');
$file->addLine('hello world1');
$file->addLine('hello world2');
$file->addLine('hello world3');
