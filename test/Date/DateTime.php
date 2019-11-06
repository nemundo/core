<?php

require __DIR__.'/../config.php';


$dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
$dateTime->setNow();

(new \Nemundo\Core\Debug\Debug())->write($dateTime->getIsoDateFormat());
(new \Nemundo\Core\Debug\Debug())->write($dateTime->getIsoDateTimeFormat());


$dateTime = new \Nemundo\Core\Type\DateTime\DateTime('2019-11-05T21:50:00+01:00');
(new \Nemundo\Core\Debug\Debug())->write($dateTime->getIsoDateFormat());
(new \Nemundo\Core\Debug\Debug())->write($dateTime->getIsoDateTimeFormat());


