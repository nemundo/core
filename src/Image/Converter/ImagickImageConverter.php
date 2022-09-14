<?php

namespace Nemundo\Core\Image\Converter;

use Nemundo\Core\Image\Resize\AbstractImageResize;
use Nemundo\Core\Image\Type\ImageType;

class ImagickImageConverter extends AbstractImageResize
{

    public $imageType = ImageType::JPG;

    public function resizeImage()
    {

        $image = new \Imagick($this->sourceFilename);
        $image->setImageFormat($this->imageType);
        $image->writeImage($this->destinationFilename);

    }

}