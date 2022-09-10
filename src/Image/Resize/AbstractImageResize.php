<?php

namespace Nemundo\Core\Image\Resize;

use Nemundo\Core\Image\Base\AbstractImageTransformation;

abstract class AbstractImageResize extends AbstractImageTransformation
{

    abstract public function resizeImage();

}