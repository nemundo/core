<?php

namespace Nemundo\Core\GeoJson\Feature;

use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;

abstract class AbstractLineFeature extends AbstractFeature
{

    /**
     * @var AbstractGeoCoordinate[]
     */
    private $geoCoordinateList = [];

    public function addGeoCoordinate(AbstractGeoCoordinate $geoCoordinate)
    {

        $this->geoCoordinateList[] = $geoCoordinate;
        return $this;

    }

    public function getGeoCoordinateList() {
        return $this->geoCoordinateList;
    }

}