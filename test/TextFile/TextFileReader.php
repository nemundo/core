<?php

require '../config.php';

$filename = 'data/test.txt';

$textFileReader = new \Nemundo\Core\TextFile\Reader\TextFileReader($filename);

(new \Nemundo\Core\Debug\Debug())->write($textFileReader->getText());
(new \Nemundo\Core\Debug\Debug())->write($textFileReader->getData());
