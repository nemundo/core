<?php

require __DIR__.'/../config.php';





$date = (new \Nemundo\Core\Type\DateTime\Date())->fromGermanLongFormat('8. Februar 2021');
(new \Nemundo\Core\Debug\Debug())->write($date->getIsoDateFormat());


/*
$date = (new \Nemundo\Core\Type\DateTime\Date('2020-12-31'));
(new \Nemundo\Core\Debug\Debug())->write($date->getWeekNumber());
(new \Nemundo\Core\Debug\Debug())->write($date->getFormat('o'));

$date = (new \Nemundo\Core\Type\DateTime\Date('2021-01-01'));
(new \Nemundo\Core\Debug\Debug())->write($date->getWeekNumber());
(new \Nemundo\Core\Debug\Debug())->write($date->getFormat('o'));
*/







