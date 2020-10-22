<?php

namespace Nemundo\Core\Type\Geo;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\Text\Text;

abstract class AbstractGeoCoordinate extends AbstractBase
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


    abstract protected function loadGeoCoordinate();

    public function __construct() {
        $this->loadGeoCoordinate();
    }


    protected function fromText($text)
    {

        $text=new Text($text);
        $list= $text->split(',');

        $this->latitude =$list[0];
        $this->longitude =$list[1];

        return $this;

// 47.200985, 8.464844

    }

    public function getText()
    {
        $text = $this->latitude . ',' . $this->longitude;
        return $text;
    }

}