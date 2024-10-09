<?php

namespace Nemundo\Core\GeoJson\Document;

use Nemundo\Core\Base\Document\AbstractDocument;
use Nemundo\Core\GeoJson\Feature\AbstractFeature;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Json\Response\JsonResponse;
use Nemundo\Core\TextFile\Writer\TextFileWriter;

abstract class AbstractGeoJsonDocument extends AbstractDocument
{

    /**
     * @var AbstractFeature[]
     */
    protected $featureList = [];

    public function addFeature(AbstractFeature $feature)
    {

        $this->featureList[] = $feature;
        return $this;

    }


    protected function onRender()
    {

        $response = new JsonResponse();
        $response->setData($this->getData());
        $response->render();

    }


    protected function onWrite($fullFilename)
    {

        $file = new TextFileWriter($fullFilename);
        $file->overwriteExistingFile = $this->overwriteExistingFile;
        $file->addLine($this->getJson());
        $file->writeFile();

    }

    public function getJson()
    {

        $json = (new JsonText())->addData($this->getData())->getJson();
        return $json;

    }


    public function getData()
    {

        $data = [];
        $data['type'] = 'FeatureCollection';

        foreach ($this->featureList as $feature) {
            $data['features'][] = $feature->getData();
        }



        return $data;

    }

}