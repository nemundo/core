<?php

namespace Nemundo\Core\Archive;


use Nemundo\Core\File\Directory;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

class GzExtractor extends AbstractExtractor
{

    /**
     * @var string
     */
    public $extractFilename;

    // filename
    // constructor

    public function extract()
    {

        if (!$this->checkProperty(['extractFilename', 'extractPath'])) {
            return;
        }


        if ((new File($this->archiveFilename))->notExists()) {
            (new LogMessage())->writeError('Filename not exist. '.$this->archiveFilename);
            return null;
        }


        (new Directory($this->extractPath))->createDirectory();

        $bufferSize = 4096;
        $outputFilename = $this->extractPath . $this->extractFilename;

        $file = gzopen($this->archiveFilename, 'rb');
        $fileOutput = fopen($outputFilename, 'wb');

        while (!gzeof($file)) {
            fwrite($fileOutput, gzread($file, $bufferSize));
        }

        fclose($fileOutput);
        gzclose($file);

        return $outputFilename;

    }

}