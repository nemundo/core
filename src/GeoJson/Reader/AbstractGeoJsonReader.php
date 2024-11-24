<?php

namespace Nemundo\Core\GeoJson\Reader;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\GeoJson\Feature\AbstractFeature;
use Nemundo\Core\GeoJson\Feature\PointFeature;
use Nemundo\Core\GeoJson\Feature\PolygonFeature;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\Type\Geo\GeoCoordinate;

abstract class AbstractGeoJsonReader extends AbstractDataSource
{

    protected $filename;

    protected function loadData()
    {

        $jsonReader = new JsonReader();
        $jsonReader->fromFilename($this->filename);
        $jsonData = $jsonReader->getData();


        //(new Debug())->write($jsonData);

        if (isset($jsonData['features'])) {

            foreach ($jsonData['features'] as $featureJson) {

                $type = $featureJson['geometry']['type'];

                if ($type === 'Point') {

                    $feature = new PointFeature();
                    $feature->geoCoordinate->latitude = $featureJson['geometry']['coordinates'][0];
                    $feature->geoCoordinate->longitude = $featureJson['geometry']['coordinates'][1];

                    foreach ($featureJson['properties'] as $key => $value) {
                        $feature->addProperty($key, $value);
                    }

                    $this->addItem($feature);

                }


                if ($type === 'Polygon') {

                    $feature = new PolygonFeature();
                    foreach ($featureJson['geometry']['coordinates'][0] as $coordinate) {

                        $geoCoordinate = new GeoCoordinate();
                        $geoCoordinate->latitude = $coordinate[0];
                        $geoCoordinate->longitude = $coordinate[1];

                        $feature->addGeoCoordinate($geoCoordinate);

                    }

                    foreach ($featureJson['properties'] as $key => $value) {
                        $feature->addProperty($key, $value);
                    }

                    $this->addItem($feature);

                }

            }

        }

    }


    /**
     * @return AbstractFeature[]|PointFeature[]|PolygonFeature[]
     */
    public function getData()
    {

        return parent::getData();

    }

}