<?php

require '../../../../../config.php';


$url = (new \Nemundo\Core\Url\UrlConverter())->convertToUrl('Hello World Ürselèé');
(new \Nemundo\Core\Debug\Debug())->write($url);



