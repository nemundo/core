<?php

require __DIR__ . '/../config.php';

$filename = __DIR__.'/test.ini';

$file = new \Nemundo\Core\Config\ConfigFile($filename);
(new \Nemundo\Core\Debug\Debug())->write($file->existsValue('test2'));
(new \Nemundo\Core\Debug\Debug())->write($file->getValue('test2'));


/*$file->setValue('mountain','berg2');
$file->writeFile();*/
