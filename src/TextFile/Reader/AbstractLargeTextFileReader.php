<?php

namespace Nemundo\Core\TextFile\Reader;

abstract class AbstractLargeTextFileReader extends AbstractTextFileReader
{

    protected $filename;

    /**
     * @var bool
     */
    protected $utf8Encode = false;

    abstract protected function loadTextFile();

    abstract protected function onLine($line);


    public function startReading()
    {

        $this->loadTextFile();

        $file = fopen($this->filename, 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {

                if ($this->utf8Encode) {
                    $line = utf8_encode($line);
                }

                if ($this->trimLine) {
                    $line = trim($line);
                }

                $this->onLine($line);

            }
            fclose($file);
        }

    }

}