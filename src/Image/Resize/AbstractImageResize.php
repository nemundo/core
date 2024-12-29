<?php

namespace Nemundo\Core\Image\Resize;

use Nemundo\Core\Image\Base\AbstractImageTransformation;
use Nemundo\Core\Image\Format\AbstractImageFormat;
use Nemundo\Core\Image\Format\AutoSizeImageFormat;
use Nemundo\Core\Image\Format\FixHeightImageFormat;
use Nemundo\Core\Image\Format\FixWidthImageFormat;
use Nemundo\Core\Image\ImageDimension;
use Nemundo\Core\Image\ImageFile;

abstract class AbstractImageResize extends AbstractImageTransformation
{

    /**
     * @var AbstractImageFormat|FixWidthImageFormat|FixHeightImageFormat|AutoSizeImageFormat
     */
    public $format;

    abstract public function resizeImage();


    protected function getImageDimension()
    {

        $dimension = new ImageDimension();
        $dimension->width = 0;
        $dimension->height = 0;

        $sourceWidth = null;
        $sourceHeight = null;

        if (class_exists('Imagick')) {

            $image = new \Imagick($this->sourceFilename);

            $sourceWidth = $image->getImageWidth();
            $sourceHeight = $image->getImageHeight();

        } else {

            $image = new ImageFile($this->sourceFilename);

            $sourceWidth = $image->width;
            $sourceHeight = $image->height;

        }

        switch ($this->format->getClassName()) {

            case AutoSizeImageFormat::class:
                if ($sourceWidth >= $sourceHeight) {
                    $dimension->width = $this->format->size;
                    $dimension->height = round($this->format->size * ($sourceHeight / $sourceWidth));
                }

                if ($sourceWidth < $sourceHeight) {
                    $dimension->height = $this->format->size;
                    $dimension->width = round($this->format->size * ($sourceWidth / $sourceHeight));
                }
                break;

            case FixWidthImageFormat::class:
                $dimension->width = $this->format->width;
                $dimension->height = round($this->format->width * ($sourceHeight / $sourceWidth));
                break;

            case FixHeightImageFormat::class:
                $dimension->height = $this->format->height;
                $dimension->width = round($this->format->height * ($sourceWidth / $sourceHeight));
                break;
        }

        return $dimension;

    }

}