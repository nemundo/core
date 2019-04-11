<?php

require '../../../../../config.php';


$format = new \Nemundo\Core\Image\Format\FixWidthImageFormat();
$format->width = 200;

$imageResize = new \Nemundo\Core\Image\ImageResize();
$imageResize->sourceFilename = 'c:\test\1775.jpg';
$imageResize->destinationFilename = 'c:\test\resize.jpg';
$imageResize->format = $format;
$imageResize->resizeImage();




