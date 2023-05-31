<?php

require __DIR__ . '/../../config.php';


class TestLargeTextFileReader extends \Nemundo\Core\TextFile\Reader\AbstractLargeTextFileReader
{

    protected function loadTextFile()
    {

        $this->filename = '';

    }


    protected function onLine($line)
    {

        (new \Nemundo\Core\Debug\Debug())->write($this->lineCount);
        (new \Nemundo\Core\Debug\Debug())->write($line);

    }

}


(new TestLargeTextFileReader())->startReading();



