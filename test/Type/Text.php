<?php

require __DIR__.'/../config.php';

$text = new \Nemundo\Core\Type\Text\Text('hello world');

//$text->changeToLowercase();
$text->changeToUppercase();

(new \Nemundo\Core\Debug\Debug())->write($text->getValue());



