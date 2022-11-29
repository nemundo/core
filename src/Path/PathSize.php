<?php

namespace Nemundo\Core\Path;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class PathSize extends AbstractBase
{

    private $path;


    public function __construct($path)
    {

        $this->path = $path;

    }


    public function getFileSize()
    {

        $size = $this->getPathSize($this->path);

        $fileSize = new \Nemundo\Core\File\FileSize($size);
        return $fileSize;

    }


    private function getPathSize($dir)
    {
        $count_size = 0;
        $count = 0;
        $dir_array = scandir($dir);
        foreach ($dir_array as $key => $filename) {
            if ($filename != '..' && $filename != '.') {
                if (is_dir($dir . '/' . $filename)) {
                    $new_foldersize = $this->getPathSize($dir . '/' . $filename);
                    $count_size = $count_size + $new_foldersize;
                } else if (is_file($dir . '/' . $filename)) {
                    $count_size = $count_size + filesize($dir . '/' . $filename);
                    $count++;
                }
            }
        }

        return $count_size;

    }

}