<?php

require __DIR__ . '/../config.php';

$filename = 'D:\Test Data\Image\DSCN0010.jpg';

$exif = new \Nemundo\Core\Image\Exif\Exif($filename);
(new \Nemundo\Core\Debug\Debug())->write('Orientation: ' . $exif->orientation);
(new \Nemundo\Core\Debug\Debug())->write('Camera: ' . $exif->camera);
(new \Nemundo\Core\Debug\Debug())->write('Title: ' . $exif->title);
(new \Nemundo\Core\Debug\Debug())->write('Description: ' . $exif->description);
(new \Nemundo\Core\Debug\Debug())->write('Date/Time: ' . $exif->dateTime->getShortDateTimeLeadingZeroFormat());
if ($exif->hasCoordinate()) {
    (new \Nemundo\Core\Debug\Debug())->write('Coordinate: ' . $exif->geoCoordinate->getText());
}