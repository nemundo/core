<?php

require __DIR__.'/../config.php';


$phpConfig = new \Nemundo\Core\System\PhpEnvironment();

(new \Nemundo\Core\Debug\Debug())->write($phpConfig->getPhpVersion());
