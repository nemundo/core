<?php

require __DIR__.'/../../../../config.php';


$calendarWeek = new \Nemundo\Core\Date\Week\CalendarWeek(28, 2019);

(new \Nemundo\Core\Debug\Debug())->write($calendarWeek->startDate->getIsoDateFormat());
(new \Nemundo\Core\Debug\Debug())->write($calendarWeek->endDate->getIsoDateFormat());

