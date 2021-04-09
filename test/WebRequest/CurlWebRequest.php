<?php


require __DIR__.'/../config.php';

$url='https://www.srf.ch/asdfasdf';


$html = (new \Nemundo\Core\WebRequest\WebRequest())->getUrl($url);


