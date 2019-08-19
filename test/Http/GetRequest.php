<?php

require '../config.php';


$parameter =new \Nemundo\Core\Http\Request\Get\GetRequest('q');

(new \Nemundo\Core\Debug\Debug())->write('Value: '.$parameter->getValue());


if ($parameter->existsRequest()) {
    (new \Nemundo\Core\Debug\Debug())->write('Request exists');
} else {
    (new \Nemundo\Core\Debug\Debug())->write('Request does not exist');
}