<?php

require __DIR__ . '/../config.php';


$reader = new \Nemundo\Core\Network\Dns\DnsRecordReader();
$reader->domain = 'nemundo.com';
//$reader->domain = 'luzern.com';

foreach ($reader->getData() as $record) {

    (new \Nemundo\Core\Debug\Debug())->write($record);

}
