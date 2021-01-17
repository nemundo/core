<?php

require __DIR__.'/../config.php';


//$date = (new \Nemundo\Core\Type\DateTime\Date())->setNow();

$date = (new \Nemundo\Core\Type\DateTime\Date('2020-12-31'));
(new \Nemundo\Core\Debug\Debug())->write($date->getWeekNumber());
(new \Nemundo\Core\Debug\Debug())->write($date->getYear());

$date = (new \Nemundo\Core\Type\DateTime\Date('2021-01-01'));
(new \Nemundo\Core\Debug\Debug())->write($date->getWeekNumber());
(new \Nemundo\Core\Debug\Debug())->write($date->getYear());





