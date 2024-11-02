<?php

namespace Nemundo\Core\GeoJson\Feature;

use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;

abstract class AbstractLineFeature extends AbstractFeature
{

    /**
     * @var AbstractGeoCoordinate[]
     */
    public $geoCoordinateList = [];

    public function addGeoCoordinate(AbstractGeoCoordinate $geoCoordinate)
    {

        $this->geoCoordinateList[] = $geoCoordinate;
        return $this;

    }

}