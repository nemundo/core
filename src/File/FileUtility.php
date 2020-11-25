<?php

namespace Nemundo\Core\File;



use Nemundo\Core\Base\AbstractBase;

class FileUtility extends AbstractBase
{


    public function appendDirectorySeparatorIfNotExists($path)
    {
        $path = rtrim($path, '/');
        $path = rtrim($path, '\\');
        $path = $path . DIRECTORY_SEPARATOR;
        return $path;
    }




    public static function appendDirectorySeparatorIfNotExistsOld($path)
    {
        $path = rtrim($path, '/');
        $path = rtrim($path, '\\');
        $path = $path . DIRECTORY_SEPARATOR;
        return $path;
    }


    /*
    public static function getFileExtension($filename)
    {
        $filename = strtolower($filename);
        $extensionList = explode('.', $filename);
        $pointCount = count($extensionList) - 1;
        $extension = $extensionList[$pointCount];

        return $extension;
    }*/




}