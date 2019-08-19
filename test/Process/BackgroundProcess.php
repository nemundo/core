<?php

require __DIR__ . '/../config.php';


$process = new \Nemundo\Core\Process\BackgroundProcess();
//$process->command = 'ls';
$process->command = 'php c:\git\paranautik\bin\cmd.php flight-analyzer-background';
$process->outputFilename = 'c:\git\paranautik\tmp\test.log';
$process->run();


