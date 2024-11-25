<?php

use Nemundo\Core\Text\TextConverter;

require __DIR__ . '/../config.php';

$text = '„Wiedergeburt einer Königsberger Kastenkrippe – Ein Beitrag zur Krippenkunst des Egerlandes“';
(new \Nemundo\Core\Debug\Debug())->write((new TextConverter())->convertToUrl($text));
