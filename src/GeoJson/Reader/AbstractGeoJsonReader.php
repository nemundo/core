<?php

namespace Nemundo\Core\GeoJson\Reader;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\GeoJson\Feature\AbstractFeature;
use Nemundo\Core\GeoJson\Feature\PointFeature;
use Nemundo\Core\Json\Reader\JsonReader;

abstract class AbstractGeoJsonReader extends AbstractDataSource
{

    protected $filename;

    protected function loadData()
    {

        $jsonReader = new JsonReader();
        $jsonReader->fromFilename($this->filename);
        $jsonData = $jsonReader->getData();


        if (isset($jsonData['features'])) {

            foreach ($jsonData['features'] as $featureJson) {

                (new Debug())->write($featureJson);
                //exit;

                $type =$featureJson['geometry']['type'];

                if ($type === 'Point') {

                    $feature = new PointFeature();
                    $feature->geoCoordinate->latitude = $featureJson['geometry']['coordinates'][0];
                    $feature->geoCoordinate->longitude = $featureJson['geometry']['coordinates'][0];

                    foreach ($featureJson['properties'] as $key =>$value) {
                        $feature->addProperty($key, $value);
                    }

                    $this->addItem($feature);

                }





            }


        }


        //(new Debug())->write($jsonData);

        /*
        foreach ($jsonReader->getData() as $item) {

            (new )

        }*/



    }



    /**
     * @return AbstractFeature[]
     */
    public function getData()
    {


        return parent::getData();

    }


}