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


    /*
    public function getFileList()
    {

    }*/


    // getSubDire..

    // --> DirectoryReader

    /*
    public function getSubPathList()
    {


        /** @var AbstractPath[] $list */
    /*  $list = [];

      if ($handle = opendir($this->getPath())) {

          while (false !== ($entry = readdir($handle))) {
              if (($entry != '.') && ($entry != '..')) {

                  // Pfad anfügen
                  $filename = $entry;
                  $fullFilename = $this->getPath() . $entry;

                  //if ($this->includeDirectories) {
                  if (is_dir($fullFilename)) {


                      $subpath = new Path($fullFilename);

                      //new FileItem

                      //$fileItem = new File($fullFilename);
                      //$item[] = $fileItem;
                      $list[] = $subpath;
                  }
              }

              /*
                  if ($this->includeFiles) {
                      if (is_file($fullFilename)) {
                          $fileItem = new File($fullFilename);

                          $addItem = true;
                          if (sizeof($this->fileExtensionFilter) > 0) {
                              $addItem = false;
                              foreach ($this->fileExtensionFilter as $fileExtension) {
                                  if ($fileItem->getFileExtension() == $fileExtension) {
                                      $addItem = true;
                                  }
                              }
                          }

                          if ($addItem) {
                              $item[] = $fileItem;
                          }

                      }
                  }

                  if ($this->recursiveSearch) {
                      if (is_dir($fullFilename)) {
                          $itemRecursiv = $this->getFileListInternal($fullFilename);
                          $item = array_merge($item, $itemRecursiv);
                      }
                  }
              }*/
    /*    }
        closedir($handle);
    }

    return $list;

}*/


}