<?php

require __DIR__.'/../config.php';


$url = 'https://www.bfs.admin.ch/bfsstatic/dam/assets/7686426/master';

$reader = new \Nemundo\Core\Json\Reader\JsonReader();
$reader->fromUrl($url);

(new \Nemundo\Core\Debug\Debug())->write($reader->getData());