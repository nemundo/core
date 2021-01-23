<?php

require __DIR__ . '/../config.php';


//$value = null;
//$value = 'hello world &';
$value = '';



$text = new \Nemundo\Core\Type\Text\Text($value);

(new \Nemundo\Core\Debug\Debug())->write($text->isNumber());


/*
//$text->changeToLowercase();
$text->changeToUppercase();
$text->replace('&', \Nemundo\Html\Character\HtmlCharacter::AMPERSAND);

(new \Nemundo\Core\Debug\Debug())->write($text->getValue());
*/


