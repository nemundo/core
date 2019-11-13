<?php

namespace Nemundo\Core\Archive;


use Nemundo\Core\File\Directory;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

class ZipExtractor extends AbstractExtractor
{

    public function extract()
    {

        if (!$this->checkProperty(['archiveFilename', 'extractPath'])) {
            return;
        }


        if (!(new File($this->archiveFilename))->fileExists()) {
            (new LogMessage())->writeError('Zip Filename does not exist. Filename: '.$this->archiveFilename);
            return;
        }


        $this->extractPath = FileUtility::appendDirectorySeparatorIfNotExists($this->extractPath);

        $directory = new Directory();
        $directory->path = $this->extractPath;
        $directory->createDirectory();


        $zip = new \ZipArchive();
        if ($zip->open($this->archiveFilename) === TRUE) {
            $zip->extractTo($this->extractPath);
            $zip->close();
        } else {
            (new LogMessage())->writeError('Zip Extract Error');
        }


    }

}