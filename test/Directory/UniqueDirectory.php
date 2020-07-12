<?php

require __DIR__ . '/../config.php';

$list = new \Nemundo\Core\Directory\UniqueDirectory();
$list->addValue('B');
$list->addValue('A');
$list->addValue('C');

$list->sortList();

(new \Nemundo\Core\Debug\Debug())->write($list->getList());
(new \Nemundo\Core\Debug\Debug())->write($list->getId('B'));
