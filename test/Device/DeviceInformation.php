<?php

require __DIR__ . '/../config.php';


$deviceInformation = new \Nemundo\Core\Device\DeviceInformation();

(new \Nemundo\Core\Debug\Debug())->write($deviceInformation->getIpAddress());
(new \Nemundo\Core\Debug\Debug())->write($deviceInformation->getAgent());
(new \Nemundo\Core\Debug\Debug())->write($deviceInformation->getLanguage());
(new \Nemundo\Core\Debug\Debug())->writeBoolean($deviceInformation->isMobile());
(new \Nemundo\Core\Debug\Debug())->writeBoolean($deviceInformation->isTablet());
