<?php

require '../config.php';

$second=new \Nemundo\Core\Time\Second(60);

(new \Nemundo\Core\Debug\Debug())->write($second->getText());