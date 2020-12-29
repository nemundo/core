<?php

require __DIR__.'/../config.php';


$date = (new \Nemundo\Core\Type\DateTime\Date())->setNow();

(new \Nemundo\Core\Debug\Debug())->write($date->getWeekNumber());






