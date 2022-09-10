<?php

namespace Nemundo\Core\Image\Resize;

class ImagickImageResize extends AbstractImageResize
{

    public function resizeImage()
    {

        $image = new \Imagick($this->sourceFilename);
        $image->setImageFormat('png');
        $image->writeImage($this->destinationFilename);

    }

}