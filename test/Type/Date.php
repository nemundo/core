<?php

require __DIR__.'/../config.php';

$date = new \Nemundo\Core\Type\DateTime\Date();
$date->setNow();
$date->minusDay(1);

(new \Nemundo\Core\Debug\Debug())->write($date->isNull());
(new \Nemundo\Core\Debug\Debug())->write($date->getIsoDateFormat());
