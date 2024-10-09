<?php

namespace Nemundo\Core\GeoJson\Feature;

use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinate;

class PointFeature extends AbstractFeature
{

    /**
     * @var AbstractGeoCoordinate
     */
    public $geoCoordinate;


    protected function loadFeature()
    {

        $this->type = 'Point';
        $this->geoCoordinate = new GeoCoordinate();

    }


    public function getData()
    {

        $data = $this->getBaseData();
        $data['geometry']['coordinates'] = [$this->geoCoordinate->latitude, $this->geoCoordinate->longitude];

        return $data;

    }


}