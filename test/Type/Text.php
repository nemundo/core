<?php

require __DIR__.'/../config.php';


$value = null;
//$value='hello world';

$text = new \Nemundo\Core\Type\Text\Text($value);

//$text->changeToLowercase();
//$text->changeToUppercase();

(new \Nemundo\Core\Debug\Debug())->write($text->getValue());



