<?php

require __DIR__.'/../config.php';

(new \Nemundo\Core\Debug\Debug())->write((new \Nemundo\Core\Http\Domain\DomainInformation())->getHost());
(new \Nemundo\Core\Debug\Debug())->write((new \Nemundo\Core\Http\Domain\DomainInformation())->getDomain());

