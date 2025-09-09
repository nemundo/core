<?php

namespace Nemundo\Core\GeoJson\Feature;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\GeoJson\Document\AbstractGeoJsonDocument;

abstract class AbstractFeature extends AbstractBase
{

    public $id;

    protected $type;

    protected $propertyList = [];

    abstract protected function loadFeature();

    abstract public function getData();


    public function __construct(?AbstractGeoJsonDocument $geoJsonDocument = null)
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


    public function existsPropertyValue($field)
    {
        $value = false;
        if (isset($this->propertyList[$field])) {
            $value = true;
        }

        return $value;

    }


    public function getPropertyValue($field)
    {
        $value = null;
        if (isset($this->propertyList[$field])) {
            $value = $this->propertyList[$field];
        } else {
            (new Debug())->write('Field ' . $field . ' does not exist.');
        }

        return $value;

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