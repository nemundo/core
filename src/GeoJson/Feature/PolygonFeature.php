<?php

namespace Nemundo\Core\GeoJson\Feature;

use Nemundo\Core\Type\Geo\GeoCoordinate;

class PolygonFeature extends AbstractLineFeature
{

    protected function loadFeature()
    {

        $this->type = 'Polygon';

    }


    public function getData()
    {

        $data = $this->getBaseData();

        $geoCoordinateData = [];
        foreach ($this->geoCoordinateList as $geoCoordinate) {
            $geoCoordinateData[] = [(float)$geoCoordinate->longitude, (float)$geoCoordinate->latitude,];
        }
        $data['geometry']['coordinates'][] = $geoCoordinateData;

        return $data;

    }

}