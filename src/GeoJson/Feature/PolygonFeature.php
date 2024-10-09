<?php

namespace Nemundo\Core\GeoJson\Feature;

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