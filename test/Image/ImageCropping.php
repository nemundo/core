<?php

require __DIR__.'/../config.php';


$dimension =new \Nemundo\Core\Image\Cropping\CroppingDimension();
$dimension->x = 100;
$dimension->y = 100;
$dimension->width = 1000;
$dimension->height =500;


$cropping = new \Nemundo\Core\Image\Cropping\ImageCropping();
$cropping->sourceFilename = 'C:\Users\Urs\Desktop\Lungerensee\a.jpg';
$cropping->destinationFilename= 'C:\Users\Urs\Desktop\Lungerensee\cropping.jpg';
$cropping->croppingDimension = $dimension;
$cropping->cropping();
