<?php

namespace Nemundo\Core\GeoJson\Feature;

class LineFeature extends AbstractLineFeature
{

    protected function loadFeature()
    {

        $this->type = 'LineString';

    }


    public function getData()
    {

        $data = $this->getBaseData();

        $geoCoordinateData = [];
        foreach ($this->geoCoordinateList as $geoCoordinate) {
            $geoCoordinateData[] = [(float)$geoCoordinate->longitude, (float)$geoCoordinate->latitude];
        }
        $data['geometry']['coordinates'] = $geoCoordinateData;

        return $data;

    }

}