<?php

require '../../../../../config.php';


$textFileReader = new \Nemundo\Core\File\TextFileReader();
$textFileReader->filename = 'test.txt';
$textFileReader->getText();