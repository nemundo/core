<?php

namespace Nemundo\Core\File;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Path\Path;

class Base64File extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $filename;

    public static $exportData = true;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function getBase64()
    {

        $base64 = '';

        if (Base64File::$exportData) {
            $data = file_get_contents($this->filename);
            $base64 = base64_encode($data);
        }

        return $base64;

    }


    public function saveFile($data)
    {

        /*(new Path())
            ->addPath(dirname($this->filename))
            ->createPath();*/

        $data = base64_decode($data);
        file_put_contents($this->filename, $data);

    }

}