<?php


namespace Nemundo\Core\File;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;

abstract class AbstractFile extends AbstractBase
{

    protected $filename;

    public function __construct($filename)
    {
        $this->filename=$filename;
    }


    public function getFileExtension()
    {

        //$filename = strtolower($this->filename);
        $extensionList = explode('.', $this->filename);
        $pointCount = count($extensionList) - 1;
        $extension = $extensionList[$pointCount];

        return $extension;

    }


    // getFileSizeInByte
    public function getFileSize()
    {

        $filesize = null;
        //if ($this->fileExists()) {
            $filesize = filesize($this->filename);
            //$filesize = round($filesize / 1024, 0);
        //}

        return $filesize;

    }


    public function getFileSize2() {

$fileSize = new FileSize($this->getFileSize());
return $fileSize;

    }


    public function getCreateDateTime()
    {


        $timestamp =  filemtime($this->filename);
        $dateTime = (new DateTime())->fromTimestamp($timestamp);


       //$dateTime=new DateTime(    filemtime($this->filename))->fromUn;
       return $dateTime;


        //return DateTime

    }


    public function getModifyDateTime()
    {


    }




    // abstract getText()


    // class TextFile
    // class CsvFile
    // class ImageFile


}