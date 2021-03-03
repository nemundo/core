<?php

require __DIR__ . '/../config.php';

use Nemundo\Core\Config\ConfigFileReader;

$reader = new ConfigFileReader();
$reader->filename = __DIR__.'/test.ini';

(new \Nemundo\Core\Debug\Debug())->write($reader->getValue('test'));
