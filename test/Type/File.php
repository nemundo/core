<?php

require __DIR__.'/../config.php';


$filename='D:\Test_Data\Image_Error\61c1d62b-0206-4b4e-b0d1-00668363266e.jpg';

$file = new \Nemundo\Core\Type\File\File($filename);

if ($file->isImage()) {
    (new \Nemundo\Core\Debug\Debug())->write('image');
}
