<?php

namespace Nemundo\Core\File;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;


// Path, Direcotry Zusammenlegen???

class Directory extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $path;


    public function __construct($path = null)
    {
        $this->path = $path;
    }

    public function createDirectory()
    {

        if (!$this->checkProperty('path')) {
            return;
        }

        if (!file_exists($this->path)) {
            if (!@mkdir($this->path, 0777, true)) {
                (new LogMessage())->writeError('Error CreateFolder. Path:' . $this->path);
            }
        }


    }


    public function deleteDirectory($includingRoot = true)
    {

        if (!$this->checkProperty('path')) {
            return;
        }

        if (!file_exists($this->path)) {
            return;
        }

        $this->rmdir($this->path, $includingRoot);

    }


    private function rmdir($path, $includingRoot = true)
    {

        foreach (scandir($path) as $filename) {

            if ($filename !== '.' && $filename !== '..') {

                $fullFilename = FileUtility::appendDirectorySeparatorIfNotExists($path) . $filename;

                if (is_dir($fullFilename)) {
                    $this->rmdir($fullFilename);
                }

                if (is_file($fullFilename)) {
                    unlink($fullFilename);
                }
            }
        }

        if ($includingRoot) {
            rmdir($path);
        }

    }


}
