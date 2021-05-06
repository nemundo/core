<?php

namespace Nemundo\Core\Image;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\AbstractFile;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;


// gibt es schon unter Type !!!

// ImageProperty
// ImageType
// ImageReader


// ImageFile
class ImageFile extends AbstractFile  // AbstractBase  // File
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


    public function __construct($filename)
    {

        parent::__construct($filename);

        $file = new File($filename);

        if (!$file->fileExists()) {
            (new LogMessage())->writeError('Image: File does not exists. Filename: ' . $filename);
            return;
        }

        if (filesize($filename) == 0) {
            return;
        }

        $dimension = getimagesize($filename);

        //$dimensionList = getimagesize($this->getValue());

        /*$dimension = new ImageDimension();
        $dimension->width = $dimensionList[0];
        $dimension->height = $dimensionList[1];*/


        $this->width = $dimension[0];
        $this->height = $dimension[1];
        $this->imageType = $dimension['mime'];
        $this->imageType = str_replace('image/', '', $this->imageType);

    }


    public function getImageFileExtension() {


        $imageType = exif_imagetype($this->filename);

        $extension = null;

        switch ($imageType) {

            case IMAGETYPE_JPEG:
                $extension='.jpeg';

                break;

            case IMAGETYPE_PNG:
                $extension='.png';
                break;

            case IMAGETYPE_GIF:
                $extension='.gif';
                break;

            default:
                (new LogMessage())->writeError('No valid File Extension. Filename: ' . $this->sourceFilename);
                break;

        }

        return $extension;




    }


}