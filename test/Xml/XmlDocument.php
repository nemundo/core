<?php

require __DIR__.'/../config.php';

$path = 'c:/test/poi.xml';

$xml = new \Nemundo\Core\Xml\Document\XmlDocument();
$xml->filename = 'poi.xml';
$xml->overwriteExistingFile = true;
$xml->formatOutput = true;

/*
$poiList = new \Nemundo\Core\Xml\Document\XmlItem($xml);
$poiList->tagName = 'Pois';
$poiList->namespace = 'urn:schemas-etourist:SchemaExtension';


$item = new \Nemundo\Core\Xml\Document\XmlItem($poiList);
$item->tagName = 'Poi';
$item->addAttribute('PID',12123);


$objectTextName = new \Nemundo\Core\Xml\Document\XmlItem($item);
$objectTextName->tagName = 'Object';

$stringXml = new \Nemundo\Core\Xml\Document\XmlItem($objectTextName);
$stringXml->tagName = 'OBJECT_TEXTNAME';
$stringXml->value = 'Brändlen';
//$stringXml->namespace = 'urn:schemas-etourist:SchemaExtension';


/*
<Pois xmlns="urn:schemas-etourist:SchemaExtension">
    <Poi PID="100238829" LastChange="2024-09-18T15:19:00+02:00" LastChangeBinder="2024-09-18T15:18:51.347+02:00"
         LastChangeBy="80118" Created="2024-09-18T15:18:00+02:00" CreatedBy="80118">
        <OBJECT_TEXT_NAME xmlns="urn:schemas-etourist:Poi">
            <string xmlns="urn:eTourist:i18n" xml:lang="de-DE">Br&#xE4;ndlen 3</string>
        </OBJECT_TEXT_NAME>
        <OBJECT_TEXT_NAME_SORTIERUNG xmlns="urn:schemas-etourist:Poi"/>
*/







$xml-> writeFile($path);

