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


    /*public function getData()
    {

        $data = $this->getBaseData();

        $geoCoordinateData = [];
        foreach ($this->geoCoordinateList as $geoCoordinate) {
            $geoCoordinateData[] = [(float)$geoCoordinate->latitude, (float)$geoCoordinate->longitude];
        }
        $data['geometry']['coordinates'][] =$geoCoordinateData;

        return $data;

    }*/

}