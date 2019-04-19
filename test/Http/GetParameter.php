<?php

require '../config.php';


$parameter = new \Nemundo\Web\Http\Parameter\GetParameter();
$parameter->parameterName = 'q';

(new \Nemundo\Core\Debug\Debug())->write($parameter->getValue());

