<?php

namespace Nemundo\Core\Type\File;


use Nemundo\Core\Image\ImageDimension;

class ImageFile extends File
{

    public function getImageDimension()
    {

        $dimensionList = getimagesize($this->getValue());

        $dimension = new ImageDimension();
        $dimension->width = $dimensionList[0];
        $dimension->height = $dimensionList[1];

        return $dimension;

    }

}
