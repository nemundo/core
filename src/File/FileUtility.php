<?php

namespace Nemundo\Core\File;



class FileUtility
{

    public static function appendDirectorySeparatorIfNotExists($path)
    {
        $path = rtrim($path, '/');
        $path = rtrim($path, '\\');
        $path = $path . DIRECTORY_SEPARATOR;
        return $path;
    }


    public static function getFileExtension($filename)
    {
        $filename = strtolower($filename);
        $extensionList = explode('.', $filename);
        $pointCount = count($extensionList) - 1;
        $extension = $extensionList[$pointCount];

        return $extension;
    }




}