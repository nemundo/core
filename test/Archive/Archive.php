<?php

require __DIR__ . '/../config.php';

$archive = new \Nemundo\Core\Archive\ZipArchive();
$archive->archiveFilename = 'C:\test\archive.zip';
$archive->addFilename('');
$archive->createArchive();

