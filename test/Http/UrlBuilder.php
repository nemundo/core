<?php

require __DIR__.'/../config.php';


$urlBuilder = new \Nemundo\Core\Http\Url\UrlBuilder('https://www.test.com');
$urlBuilder->addRequestValue('test','a:1');
(new \Nemundo\Core\Debug\Debug())->write($urlBuilder->getUrl());