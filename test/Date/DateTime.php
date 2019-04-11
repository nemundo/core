<?php

require '../../../../../config.php';


$dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
$dateTime->setNow();

(new \Nemundo\Core\Debug\Debug())->write($dateTime->getIsoDateFormat());
(new \Nemundo\Core\Debug\Debug())->write($dateTime->getIsoDateTimeFormat());


