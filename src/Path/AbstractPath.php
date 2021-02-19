<?php

namespace Nemundo\Core\Path;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\Log\LogMessage;

abstract class AbstractPath extends AbstractBase
{

    /**
     * @var TextDirectory
     */
    private $path;

    abstract protected function loadPath();


    public function __construct()
    {

        $this->path = new TextDirectory();
        $this->loadPath();

    }


    public function addPath($path)
    {

        $path = rtrim($path, DIRECTORY_SEPARATOR);
        $this->path->addValue($path);
        return $this;

    }


    public function addParentPath()
    {

        $this->addPath('..');
        return $this;

    }


    public function getPath()
    {

        $path = $this->getFilename() . DIRECTORY_SEPARATOR;
        return $path;

    }


    public function getFilename()
    {

        $filename = $this->path->getTextWithSeperator(DIRECTORY_SEPARATOR);
        return $filename;

    }


    public function getLastPath()
    {

        $filename = basename($this->path->getTextWithSeperator(DIRECTORY_SEPARATOR));
        return $filename;

    }


    public function getFullFilename()
    {

        $filename = $this->path->getTextWithSeperator(DIRECTORY_SEPARATOR);
        return $filename;
    }


    public function existPath()
    {

        $returnValue = false;
        if (file_exists($this->getFilename())) {
            $returnValue = true;
        }

        return $returnValue;

    }


    public function createPath()
    {

        if (!file_exists($this->getPath())) {
            if (!@mkdir($this->getPath(), 0777, true)) {
                (new LogMessage())->writeError('Error CreateFolder. Path:' . $this->getPath());
            }
        }

        return $this;

    }


    public function deleteDirectory()
    {

        $this->rmdir($this->getPath(), true);
        return $this;

    }


    public function emptyDirectory()
    {

        $this->rmdir($this->getPath(), false);
        return $this;

    }


    private function rmdir($path, $includeBase)
    {

        if (file_exists($path)) {

            foreach (scandir($path) as $filename) {

                if ($filename !== '.' && $filename !== '..') {

                    $fullFilename = (new FileUtility())->appendDirectorySeparatorIfNotExists($path) . $filename;

                    if (is_dir($fullFilename)) {
                        $this->rmdir($fullFilename, true);
                    }

                    if (is_file($fullFilename)) {
                        unlink($fullFilename);
                    }
                }
            }

            if ($includeBase) {
                rmdir($path);
            }

        }

    }

}