<?php

use Nemundo\Core\GeoJson\Feature\LineFeature;

require __DIR__ . '/../config.php';

$document = new \Nemundo\Core\GeoJson\Document\GeoJsonDocument();
$document->filename = 'geosontest.geojson';
$document->overwriteExistingFile=true;

$feature = new \Nemundo\Core\GeoJson\Feature\PointFeature($document);
$feature->id = 'Point1';
$feature->addProperty('name', 'Point One');
$feature->addProperty('description','Hier hat es ...');

//$feature->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$feature->geoCoordinate->latitude = 42.8;
$feature->geoCoordinate->longitude = -33.8;

$feature = new \Nemundo\Core\GeoJson\Feature\PointFeature($document);
$feature->id = 'Point2';
$feature->addProperty('name', 'Point Two');
$feature->addProperty('description','Hier hat es ...');

//$feature->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$feature->geoCoordinate->latitude = 40.8;
$feature->geoCoordinate->longitude = -33.8;

(new \Nemundo\Core\Debug\Debug())->write((new \Nemundo\Core\Type\Geo\GeoCoordinate())->fromText('1,1'));

$line = new LineFeature($document);
$line->id = 'Line1';
$line->addProperty('name', 'Line');
$line->addProperty('description','Hier hat es ...');
$line
    ->addGeoCoordinate((new \Nemundo\Core\Type\Geo\GeoCoordinate())->fromText('1,1'))
    ->addGeoCoordinate((new \Nemundo\Core\Type\Geo\GeoCoordinate())->fromText('4,1'))
    ->addGeoCoordinate((new \Nemundo\Core\Type\Geo\GeoCoordinate())->fromText('7,19'));


$line = new \Nemundo\Core\GeoJson\Feature\PolygonFeature($document);
$line->id = 'Line2';
$line->addProperty('name', 'Line2');
$line->addProperty('description','Hier hat es ...');
$line
    ->addGeoCoordinate((new \Nemundo\Core\Type\Geo\GeoCoordinate())->fromText('6,6'))
    ->addGeoCoordinate((new \Nemundo\Core\Type\Geo\GeoCoordinate())->fromText('8,4'))
    ->addGeoCoordinate((new \Nemundo\Core\Type\Geo\GeoCoordinate())->fromText('20,19'))
    ->addGeoCoordinate((new \Nemundo\Core\Type\Geo\GeoCoordinate())->fromText('6,6'));



(new \Nemundo\Core\Debug\Debug())->write($document->getJson());


$document->writeFile('c:/test');