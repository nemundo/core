<?php

require __DIR__.'/../config.php';

(new \Nemundo\Core\Log\LogPath())->createPath();

(new \Nemundo\Core\Log\PerformanceLog(0.1))->writeLog('Test Data');
