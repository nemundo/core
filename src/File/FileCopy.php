<?php

namespace Nemundo\Core\File;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;

class FileCopy extends AbstractBase
{

    /**
     * @var string
     */
    public $sourceFilename;

    /**
     * @var string
     */
    public $destinationFilename;

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;


    public function copyFile()
    {

        if (!$this->checkProperty(['sourceFilename', 'destinationFilename'])) {
            return;
        }

        if (!file_exists($this->sourceFilename)) {
            (new LogMessage())->writeError('Source Filen does not exist. Filename: ' . $this->sourceFilename);
            return;
        }


        if (!$this->overwriteExistingFile) {
            if (file_exists($this->destinationFilename)) {
                (new LogMessage())->writeError('Destination Filen already exists. Filename: '.$this->destinationFilename);
                return;
            }
        }


        /*
        $directory = new Directory();
        $directory->path = dirname($this->destinationFilename);
        $directory->createDirectory();*/

        (new Path(dirname($this->destinationFilename)))->createPath();


        // todo: fehlerbehandlung
        copy($this->sourceFilename, $this->destinationFilename);

    }

}