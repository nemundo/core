<?php

require __DIR__ . '/../config.php';

$bz2Extractor = new \Nemundo\Core\Archive\Bz2Extractor();
$bz2Extractor->archiveFilename = 'C:\test\antarctica-latest.osm.bz2';
$bz2Extractor->extractFilename = 'antarctica-latest.osm';
$bz2Extractor->extractPath = 'C:\test';
$bz2Extractor->extractArchive();

