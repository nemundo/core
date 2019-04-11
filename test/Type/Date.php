<?php

require '../../../../../config.php';


$date = new \Nemundo\Core\Type\DateTime\Date();
$date->setNow();
$date->minusDay(1);


(new \Nemundo\Core\Debug\Debug())->write($date->getIsoDateFormat());
