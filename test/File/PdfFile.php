<?php

require __DIR__ . '/../config.php';

$url = 'http://www.agf.ch/doc/Frey2007.pdf';
$filename = __DIR__ . '/test.pdf';

(new \Nemundo\Core\WebRequest\CurlWebRequest())->downloadUrl($url, $filename);

$file = new \Nemundo\Core\File\Pdf\PdfFile($filename);
(new \Nemundo\Core\Debug\Debug())->write($file->getPdfText());

(new \Nemundo\Core\Type\File\File($filename))->deleteFile();