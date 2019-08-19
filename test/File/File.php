<?php

require __DIR__.'/../config.php';


$filename = \Nemundo\Web\WebConfig::$webPath;
$file = new \Nemundo\Core\Type\File\File($filename);

(new \Nemundo\Core\Debug\Debug())->write($file->fullFilename);

if ($file->exists()) {
    (new \Nemundo\Core\Debug\Debug())->write('File exists');
} else {
    (new \Nemundo\Core\Debug\Debug())->write('File does not exist');
}
