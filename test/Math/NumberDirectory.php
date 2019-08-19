<?php

require __DIR__ . '/../config.php';

$numberList = new \Nemundo\Core\Math\NumberDirectory();
$numberList->addValue(0);
$numberList->addValue(0);

$numberList->addValue(0);
$numberList->addValue(0);
$numberList->addValue(30);


(new \Nemundo\Core\Debug\Debug())->write('Average: '.$numberList->getAverage());
(new \Nemundo\Core\Debug\Debug())->write('Median: '.$numberList->getMedian());

