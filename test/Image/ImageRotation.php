<?php

require __DIR__.'/../config.php';

$filename ='C:\Users\Urs\Desktop\walenstöcke\DSC00121.jpg';

$rotation = new \Nemundo\Core\Image\Manipulation\ImageRotation($filename);
$rotation->autoRotateImage();
