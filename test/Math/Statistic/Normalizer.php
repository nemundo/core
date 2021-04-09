<?php

require __DIR__ . '/../../config.php';

$normalizer = new \Nemundo\Core\Math\Statistic\Normalizer();
$normalizer->minValue = 100;
$normalizer->maxValue=150;

(new \Nemundo\Core\Debug\Debug())->write($normalizer->normalizeValue(101));





/*
$normalizer->addValue(10);
$normalizer->addValue(20);
$normalizer->addValue(null);
/*$normalizer->addValue(-30);
$normalizer->addValue(30);
$normalizer->addValue(30);*/

/*
(new \Nemundo\Core\Debug\Debug())->write($normalizer->getNormalizedData());

(new \Nemundo\Core\Debug\Debug())->write($normalizer->normalizeValue(199));
*/