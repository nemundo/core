<?php

require __DIR__ . '/../config.php';

$filename = 'C:\test\geojson\CITYMAPS_HISTORISCHE_BILDER.json';
$filename='C:\test\geojson\TOILETTE.json';

$reader = new \Nemundo\Core\GeoJson\Reader\GeoJsonReader();
$reader->filename = $filename;

foreach ($reader->getData() as $feature) {

    (new \Nemundo\Core\Debug\Debug())->write($feature->getPropertyValue('NAME'));

}