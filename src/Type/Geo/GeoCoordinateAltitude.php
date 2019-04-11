<?php

namespace Nemundo\Core\Type\Geo;


class GeoCoordinateAltitude extends GeoCoordinate
{

    /**
     * @var float
     */
    public $altitude;  // = 0;


    public function fromGeoCoordinate(GeoCoordinate $geoCoordinate = null)
    {
        if ($geoCoordinate !== null) {
            $this->latitude = $geoCoordinate->latitude;
            $this->longitude = $geoCoordinate->longitude;
        }
        return $this;
    }


    public function toString()
    {
        $text = $this->latitude . ',' . $this->longitude . ',' . $this->altitude;
        return $text;
    }


}