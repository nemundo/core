<?php

require __DIR__ . '/../config.php';


$geoCoordinateDistance = new \Nemundo\Core\Geo\GeoCoordinateCenter();

$coordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$coordinate->latitude = 1;
$coordinate->longitude = 1;
$geoCoordinateDistance->addCoordinate($coordinate);

$coordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$coordinate->latitude = 2;
$coordinate->longitude = 2;
$geoCoordinateDistance->addCoordinate($coordinate);

(new \Nemundo\Core\Debug\Debug())->write($geoCoordinateDistance->getCenter());


$geoCoordinateDistance = new \Nemundo\Core\Geo\GeoCoordinateAltitudeCenter();

$coordinate = new \Nemundo\Core\Type\Geo\GeoCoordinateAltitude();
$coordinate->latitude = 1;
$coordinate->longitude = 1;
$coordinate->altitude = 100;
$geoCoordinateDistance->addCoordinate($coordinate);

$coordinate = new \Nemundo\Core\Type\Geo\GeoCoordinateAltitude();
$coordinate->latitude = 2;
$coordinate->longitude = 2;
$coordinate->altitude = 200;
$geoCoordinateDistance->addCoordinate($coordinate);

(new \Nemundo\Core\Debug\Debug())->write($geoCoordinateDistance->getCenter());


