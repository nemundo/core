<?php

require __DIR__.'/../config.php';


/*
Jan 09
Feb 09
Mrz 09
Apr 09
Mai 09
Jun 09
Jul 09
Aug 09
Sep 09
Okt 09
Nov 09
Dez 09
*/



$date=new \Nemundo\Core\Type\DateTime\Date('Jan 09');
(new \Nemundo\Core\Debug\Debug())->write($date->getIsoDateFormat());




