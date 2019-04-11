<?php

namespace Nemundo\Core\WebRequest;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\Path;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Project\ProjectConfig;

class FileDownload extends AbstractBase
{

    /**
     * @var string
     */
    public $filename;

    public function downloadUrl($url)
    {

        $filename = (new Path())
            ->addPath(ProjectConfig::$tmpPath)
            ->addPath('noaa')
            ->addPath($this->filename)
            ->getFilename();

        $file = new File($filename);
        if (!$file->exists()) {
            (new WebRequest())->downloadUrl($url, $filename);
        }

        return $filename;

    }


}