<?php

require __DIR__ . '/../config.php';


$filename = '';


$file = new \Nemundo\Core\Type\File\File($filename);

(new \Nemundo\Core\Debug\Debug())->write($file->fullFilename);
(new \Nemundo\Core\Debug\Debug())->write($file->getFileExtension());

if ($file->fileExists()) {
    (new \Nemundo\Core\Debug\Debug())->write('File exists');
} else {
    (new \Nemundo\Core\Debug\Debug())->write('File does not exist');
}
