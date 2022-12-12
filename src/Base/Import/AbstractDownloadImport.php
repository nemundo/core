<?php

namespace Nemundo\Core\Base\Import;


use Nemundo\Core\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Project\Path\TmpPath;

abstract class AbstractDownloadImport extends AbstractImport
{

    private $fullFilename;

    protected function downloadFile($url, $filename)
    {

        $this->fullFilename = (new TmpPath())
            ->addPath($filename)
            ->getFullFilename();

        //if ((new File($filename))->fileNotExists()) {
        (new WebRequest())->downloadUrl($url, $this->fullFilename);
        //}

        return $this->fullFilename;

    }


    protected function deleteFile()
    {

        (new File($this->fullFilename))->deleteFile();
        return $this;

    }

}