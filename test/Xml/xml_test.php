<?php

require __DIR__ . '/../config.php';


$filename = __DIR__ . '/route.xml';


$xmlReader = new \Nemundo\Core\Xml\Document\XmlDocument();


$dom = new \DOMDocument();
$dom->load($filename);
$dom->formatOutput = true;

/*
<gpx creator="MySchweizMobil - https://map.schweizmobil.ch/" version="1.1" xmlns="http://www.topografix.com/GPX/1/1"
     xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
     xsi:schemaLocation="http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/1/1/gpx.xsd">
    <metadata>
        <name>Hike One</name>
        <bounds maxlat="46.113334511279426" maxlon="9.06360351819853" minlat="46.096799511154224"
                minlon="9.045000518465006"/>
    </metadata>
    <trk>
        <name>Hike One</name>
        <trkseg>*/


$content = $dom->getElementsByTagName('gpx')->item(0);
$before = $content->getElementsByTagName('trk')->item(0);

//find the first h3 tag in "content"
//$origH3 = $content->getElementsByTagName('h3')->item(0);

//create a new h3
$newH3 = $dom->createElement('myname', 'kurs klang');

//insert the new h3 before the original h3 of "content"
$content->insertBefore($newH3, $before);


(new \Nemundo\Core\Debug\Debug())->write($dom->saveXML());





