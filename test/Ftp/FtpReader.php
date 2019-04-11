<?php

require '../../../../../config.php';

$reader = new \Nemundo\Core\Ftp\FtpReader();
$reader->host = 'ftp.ncdc.noaa.gov';
$reader->path = '/pub/data/noaa/isd-lite/2017/';

foreach ($reader->getData() as $row) {
    (new \Nemundo\Core\Debug\Debug())->write($row);
}
