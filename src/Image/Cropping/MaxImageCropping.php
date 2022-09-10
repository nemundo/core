<?php

namespace Nemundo\Core\Image\Cropping;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Image\ImageFile;


// AutoImageCropping
class MaxImageCropping extends AbstractBase
{

    public $aspectRatioWidth;

    public $aspectRatioHeight;

    /**
     * @var bool
     */
    public $centerImage = true;

    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }


    public function getCroppingDimension()
    {

        $image = new ImageFile($this->filename);

        $dimension = new CroppingDimension();
        $dimension->x = 0;
        $dimension->y = 0;

        $ratioWidth = $image->width / $this->aspectRatioWidth;
        $ratioHeight = $image->height / $this->aspectRatioHeight;

        if ($ratioWidth <= $ratioHeight) {
            $dimension->width = $image->width;
            $dimension->height = floor($image->width * ($this->aspectRatioHeight / $this->aspectRatioWidth));
            $dimension->y = floor(($image->height - $dimension->height) / 2);
        }

        if ($ratioHeight < $ratioWidth) {
            $dimension->height = $image->height;
            $dimension->width = floor($image->height * ($this->aspectRatioWidth / $this->aspectRatioHeight));
            $dimension->x = floor(($image->width - $dimension->width) / 2);
        }

        return $dimension;

    }

}