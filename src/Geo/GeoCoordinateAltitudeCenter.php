<?php


namespace Nemundo\Core\Geo;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Math\NumberDirectory;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinateAltitude;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;


class GeoCoordinateAltitudeCenter extends AbstractBase
{

    /**
     * @var GeoCoordinateAltitude[]
     */
    private $coordinateList = [];

    public function addCoordinate(AbstractGeoCoordinateAltitude $geoCoordinate)
    {

        $this->coordinateList[] = $geoCoordinate;
        return $this;

    }


    public function getCenter()
    {


        $latList = new NumberDirectory();
        $lonList = new NumberDirectory();
        $altList = new NumberDirectory();

        foreach ($this->coordinateList as $geoCoordinate) {

            $latList->addValue($geoCoordinate->latitude);
            $lonList->addValue($geoCoordinate->longitude);
            $altList->addValue($geoCoordinate->altitude);

        }

        $center = new GeoCoordinateAltitude();
        $center->latitude = $latList->getMedian();
        $center->longitude = $lonList->getMedian();
        $center->altitude = $altList->getMedian();

        return $center;

    }

}