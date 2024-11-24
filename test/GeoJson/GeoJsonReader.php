<?php

require __DIR__ . '/../config.php';

//$filename = 'C:\test\geojson\CITYMAPS_HISTORISCHE_BILDER.json';
//$filename='C:\test\geojson\TOILETTE.json';
//$filename='C:\test\geojson\SPIELPLATZ_ANLAGE.json';
//$filename = 'C:\test\geojson\e331_spielplaetze_und_geraete.json';
$filename = 'C:\test\swisstlm3d_2024-03_2056_5728.gpkg\uebrigebahn.geojson';

// https://docs.mapbox.com/mapbox-gl-js/assets/earthquakes.geojson

$reader = new \Nemundo\Core\GeoJson\Reader\GeoJsonReader();
$reader->filename = $filename;

foreach ($reader->getData() as $feature) {

    (new \Nemundo\Core\Debug\Debug())->write($feature);
    //exit;

//    (new \Nemundo\Core\Debug\Debug())->write($feature->getPropertyValue('NAME'));

}