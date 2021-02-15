<?php

require __DIR__.'/../config.php';

$url = new \Nemundo\Core\Http\Url\UrlInformation('https://www.nemundo.com');

(new \Nemundo\Core\Debug\Debug())->write($url->getHost());
(new \Nemundo\Core\Debug\Debug())->write($url->getProtocol());

