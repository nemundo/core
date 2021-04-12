<?php


namespace Nemundo\Core\Geo;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Math\NumberDirectory;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Paranautik\Xcontest\Content\Takeoff\TakeoffContentType;
use Paranautik\Xcontest\Data\Flight\FlightReader;
use Paranautik\Xcontest\Data\Takeoff\TakeoffReader;

class GeoCoordinateCenter extends AbstractBase
{

    /**
     * @var GeoCoordinate[]
     */
    private $coordinateList=[];

    public function addCoordinate(AbstractGeoCoordinate $geoCoordinate) {

        $this->coordinateList[]=$geoCoordinate;
        return $this;

    }


    public function getCenter() {


        $latList = new NumberDirectory();
        $lonList = new NumberDirectory();

        foreach ($this->coordinateList as $geoCoordinate) {

                $latList->addValue($geoCoordinate->latitude);
                $lonList->addValue($geoCoordinate->longitude);

        }

        $center = new GeoCoordinate();
        $center->latitude = $latList->getMedian();
        $center->longitude = $lonList->getMedian();

        return $center;

    }

}