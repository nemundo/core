<?php

namespace Nemundo\Core\Image;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

// ImageFile
class Image extends File
{

    /**
     * @var int
     */
    public $width;

    /**
     * @var int
     */
    public $height;

    /**
     * @var string
     */
    public $imageType;


    public function __construct($value)
    {
        parent::__construct($value);

        $filename = $this->getValue();

        $file = new File($filename);

        if (!$file->exists()) {
            (new LogMessage())->writeError('Image: File does not exists. Filename: ' . $filename);
            return;
        }

        if (filesize($filename) == 0) {
            return;
        }

        $dimension = getimagesize($this->getValue());

        $this->width = $dimension[0];
        $this->height = $dimension[1];
        $this->imageType = $dimension['mime'];
        $this->imageType = str_replace('image/', '', $this->imageType);

    }

}