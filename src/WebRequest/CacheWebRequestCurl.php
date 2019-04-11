<?php

namespace Nemundo\Core\WebRequest;


use Nemundo\Core\File\Path;
use Nemundo\Core\File\TextFile;
use Nemundo\Core\File\TextFileReader;
use Nemundo\Core\Type\File\File;
use Nemundo\Project\ProjectConfig;

class CacheWebRequestCurl extends WebRequestCurl
{

    /**
     * @var bool
     */
    public $usingCache = true;

    public function getUrl($url)
    {

        $html = null;

        if ($this->usingCache) {

            $filename = (new Path())
                ->addPath(ProjectConfig::$projectPath)
                ->addPath('cache')
                ->addPath('web')
                ->addPath(md5($url))
                ->getFilename();


            if (!(new File($filename))->exists()) {

                $content = parent::getUrl($url);

                $file = new TextFile();
                $file->filename = $filename;
                $file->addLine($content);

            }

            $file = new TextFileReader();
            $file->filename = $filename;
            $html = $file->getText();

        } else {

            $html = parent::getUrl($url);

        }

        return $html;

    }

}