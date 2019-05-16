<?php

require __DIR__.'/../config.php';


$text = new \Nemundo\Core\Type\Text\Text('hello world');
$text2 = 'hello world';

//$text->changeToLowercase();
//$text->changeToUppercase();

//(new \Nemundo\Core\Debug\Debug())->write($text->getValue());


$performance = new \Nemundo\App\Performance\PerformanceStopwatch('substring');

$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 0;
$loop->maxNumber = 100000;
foreach ($loop->getData() as $number) {
    //$text->getSubstring(0, 5);

    $a = $text2[0].$text2[1].$text2[3].$text2[4].$text2[5];

}
$performance->stopStopwatch();

$performance->writeToScreen();


