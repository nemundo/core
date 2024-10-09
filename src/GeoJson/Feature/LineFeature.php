<?php

namespace Nemundo\Core\GeoJson\Feature;

use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinate;

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
            $geoCoordinateData[] = [(float)$geoCoordinate->latitude, (float)$geoCoordinate->longitude];
        }
        $data['geometry']['coordinates'] =$geoCoordinateData;

        return $data;

    }



   /* public function getData()
    {

        $data = $this->getBaseData();  // [];
        //$data['type'] = 'Feature';
        //$data['properties'] = $this->getPropertyList();
        $data['geometry']['coordinates'] = [$this->geoCoordinate->latitude, $this->geoCoordinate->longitude];
        //$data['geometry']['type'] = $this->type;
        //$data['id'] = $this->id;

        return $data;

    }*/


}