<?php

namespace Nemundo\Core\File;

use Nemundo\Core\Base\AbstractBase;

class FileInformation extends AbstractBase
{

    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }


    public function getExtension()
    {

        $filename = strtolower($this->filename);
        $extensionList = explode('.', $filename);
        $pointCount = count($extensionList) - 1;
        $extension = $extensionList[$pointCount];

        return $extension;

    }


    public function isImage()
    {

        $value = false;

        switch ($this->getExtension()) {

            case 'jpeg':
            case 'jpg':
            case 'png':
            case 'gif':
                $value = true;
                break;

        }


        return $value;


    }


    public function isPdf()
    {

        $value = false;

        if ($this->getExtension() == 'pdf') {
            $value = true;
        }

        return $value;

    }


    public function isText()
    {

        $value = false;

        if ($this->getExtension() == 'txt') {
            $value = true;
        }

        return $value;

    }


}