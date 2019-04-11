<?php

namespace Nemundo\Core\Type\Geo;

use Nemundo\Core\Base\AbstractBaseClass;

class GeoCoordinate extends AbstractBaseClass
{

    // isNull Function ???

    /**
     * @var float
     */
    public $latitude;  // = 0;

    /**
     * @var float
     */
    public $longitude;  // = 0;


    public function fromString()
    {

// 47.200985, 8.464844

    }

    public function toString()
    {
        $text = $this->latitude . ',' . $this->longitude;
        return $text;
    }

}