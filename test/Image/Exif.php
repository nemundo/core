<?php

require __DIR__ . '/../config.php';


$filename = 'C:\test\f3972448-a674-4107-b8e3-a46daedc2ec1.jpg';

$exif = new \Nemundo\Core\Image\Exif\Exif($filename);

(new \Nemundo\Core\Debug\Debug())->write('Orientation: ' . $exif->orientation);
