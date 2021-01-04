<?php

require __DIR__.'/../config.php';

$filename = 'C:\test\test1.jpg';

$filename ='C:\git\app\web\data\mediacrawler_media\image\e754c0e0-5ede-465e-9631-a052b6372004.jpg';


$img = new \Nemundo\Core\Image\ImageFile($filename);
(new \Nemundo\Core\Debug\Debug())->write('Image Type: '.$img->imageType);
(new \Nemundo\Core\Debug\Debug())->write('Width: '.$img->width);
(new \Nemundo\Core\Debug\Debug())->write('Height: '.$img->height);
