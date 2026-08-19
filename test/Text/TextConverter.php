<?php

use Nemundo\Core\Text\TextConverter;

require __DIR__ . '/../config.php';

$text = '';
(new \Nemundo\Core\Debug\Debug())->write((new TextConverter())->convertToUrl($text));
