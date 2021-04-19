<?php


require __DIR__ . '/../config.php';

//$url='https://www.paranautik.com/jhjklhljhlkjhlkjhlk';
//$url='https://www.paranautik.com/';
$url = 'https://paranautik.com/';

$response = (new \Nemundo\Core\WebRequest\CurlWebRequest())->getUrl($url);

(new \Nemundo\Core\Debug\Debug())->write($response->statusCode);
(new \Nemundo\Core\Debug\Debug())->write($response->url);

(new \Nemundo\Core\Debug\Debug())->write($response);


//$html = (new \Nemundo\Core\WebRequest\WebRequest())->getUrl($url);


