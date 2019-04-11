<?php

require '../../vendor/autoload.php';


$json = new \Nemundo\Core\Json\Document\JsonResponse();
$json->addRow('hello world');
$json->render();

