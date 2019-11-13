<?php

namespace Nemundo\Core\TextFile\Reader;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

class LargeTextFileReader extends AbstractBaseClass
{

    public $filename;

    private $started = false;

    private $handle;

    private $endOfFile = false;


    private $buffer;

    public function endOfFile()
    {

        if (!$this->checkProperty('filename')) {
            return true;
        }

        $file = new File($this->filename);
        if (!$file->fileExists()) {
            (new LogMessage())->writeError('File ' . $this->filename . ' does not exist.');
            return true;
        }


        if (!$this->started) {

            $this->handle = fopen($this->filename, 'r');

            if ($this->handle) {

            }

            $this->started = true;

        }


        if (!feof($this->handle)) {
            $this->buffer = fgets($this->handle, 4096);
        } else {
            fclose($this->handle);
            $this->endOfFile = true;
        }

        return $this->endOfFile;

    }

    public function getLine()
    {

        return $this->buffer;

    }

}