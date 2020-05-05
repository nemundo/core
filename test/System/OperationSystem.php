<?php

require __DIR__.'/../config.php';

(new \Nemundo\Core\Debug\Debug())->write((new \Nemundo\Core\System\OperatingSystem())->getOperatingSystem());
(new \Nemundo\Core\Debug\Debug())->write((new \Nemundo\Core\System\OperatingSystem())->isLinux());
(new \Nemundo\Core\Debug\Debug())->write((new \Nemundo\Core\System\OperatingSystem())->isWindows());
