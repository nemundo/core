<?php

require __DIR__.'/../config.php';

$filename = 'C:\test\test1.jpg';
//$filename ='C:\git\app\web\data\mediacrawler_media\image\e754c0e0-5ede-465e-9631-a052b6372004.jpg';
//$filename ='C:\test\image-1488314-900_breitwand_180x67-krjc-1488314.jpg';

//$format = new \Nemundo\Core\Image\Format\FixWidthImageFormat();
//$format->width = 400;

$format = new \Nemundo\Core\Image\Format\AutoSizeImageFormat();
$format->size = 400;

$imageResize = new \Nemundo\Core\Image\ImageResize();
$imageResize->sourceFilename =$filename;
$imageResize->destinationFilename = 'c:\test\resize.jpg';
$imageResize->format = $format;
$imageResize->resizeImage();




