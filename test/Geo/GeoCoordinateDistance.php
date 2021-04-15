<?php

require __DIR__ . '/../config.php';


$geoCoordinateDistance = new \Nemundo\Core\Geo\Distance\GeoCoordinateDistance();

$geoCoordinateDistance->geoCoordinateFrom->latitude = 2.55;
$geoCoordinateDistance->geoCoordinateFrom->longitude = 2.55;

$geoCoordinateDistance->geoCoordinateTo->latitude = 3.55;
$geoCoordinateDistance->geoCoordinateTo->longitude = 2.55;

(new \Nemundo\Core\Debug\Debug())->write($geoCoordinateDistance->getDistance());
