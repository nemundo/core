<?php

require __DIR__ . '/../../config.php';

$movingAverage=new \Nemundo\Core\Math\Statistic\MovingAverage();
$movingAverage->movingNumber= 2;
$movingAverage->addNumber(10);
$movingAverage->addNumber(20);
$movingAverage->addNumber(30);
$movingAverage->addNumber(30);
$movingAverage->addNumber(30);

(new \Nemundo\Core\Debug\Debug())->write($movingAverage->getMovingAverageList());


