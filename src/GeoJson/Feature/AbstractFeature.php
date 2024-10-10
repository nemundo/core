<?php

namespace Nemundo\Core\GeoJson\Feature;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\GeoJson\Document\AbstractGeoJsonDocument;
use Nemundo\Core\Json\JsonText;

abstract class AbstractFeature extends AbstractBase
{

    public $id;

    protected $type;

    protected $propertyList = [];

    abstract protected function loadFeature();

    abstract public function getData();


    public function __construct(AbstractGeoJsonDocument $geoJsonDocument = null)
    {

        $this->loadFeature();
        if ($geoJsonDocument !== null) {
            $geoJsonDocument->addFeature($this);
        }

    }


    protected function getBaseData()
    {

        $data = [];
        $data['type'] = 'Feature';
        $data['properties'] = $this->getPropertyList();
        $data['geometry']['type'] = $this->type;
        $data['id'] = $this->id;

        return $data;

    }


    public function addProperty($field, $value)
    {

        $this->propertyList[$field] = $value;
        return $this;

    }

    public function getPropertyList()
    {

        return $this->propertyList;

    }


    public function getJson()
    {


        $json = json_encode($this->getData());
        return $json;
    }


}