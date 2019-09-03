<?php

namespace Nemundo\Core\File;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;

class Path extends AbstractBase
{

    /**
     * @var TextDirectory
     */
    private $path;

    public function __construct()
    {
        $this->path = new TextDirectory();
    }


    public function addPath($path)
    {

        $path = rtrim($path, DIRECTORY_SEPARATOR);

        $this->path->addValue($path);
        return $this;
    }


    public function getPath()
    {

        $path = $this->path->getTextWithSeperator(DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        return $path;
    }


    public function getFilename()
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


    public function createDirectory()
    {

        $directory = new Directory($this->getPath());
        $directory->createDirectory();

        return $this;

    }


    public function deleteDirectory()
    {

        $dir = new Directory($this->getPath());
        $dir->deleteDirectory(true);

        return $this;

    }


    public function emptyDirectory()
    {

        $dir = new Directory($this->getPath());
        $dir->deleteDirectory(true);

        return $this;

    }

}