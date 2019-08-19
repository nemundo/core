<?php

require __DIR__.'/../config.php';


$reader = new \Nemundo\Core\Xml\Reader\XmlReader();
$reader->filename = __DIR__.'/route.gpx';

foreach ($reader->getData() as $row) {
    (new \Nemundo\Core\Debug\Debug())->write($row);
}


