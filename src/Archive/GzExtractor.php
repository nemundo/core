<?php

namespace Nemundo\Core\Archive;


use Nemundo\Core\File\Directory;

class GzExtractor extends AbstractExtractor
{

    /**
     * @var string
     */
    public $extractFilename;

    public function extract()
    {

        if (!$this->checkProperty(['extractFilename', 'extractPath'])) {
            return;
        }


        (new Directory($this->extractPath))->createDirectory();

        $bufferSize = 4096;
        $outputFilename = $this->extractPath . $this->extractFilename;  // 'unzipped_file';

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