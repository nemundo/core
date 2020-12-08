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

}