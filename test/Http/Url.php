<?php


require '../config.php';


$url = new \Nemundo\Core\Http\Url\Url();


$request = new \Nemundo\Core\Http\Request\Get\GetRequest('q');
$request->defaultValue = 'hello';
$url->addRequest($request);
