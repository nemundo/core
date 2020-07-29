<?php

namespace Nemundo\Core\Directory;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

// UniquList
// KeyValueList
abstract class AbstractKeyValueDirectory extends AbstractBase
{

    public $startId = 1;

    private $list = [];


    private $currentId;


    abstract protected function loadDirectory();

    abstract protected function onNotExists($value);


    public function __construct()
    {
        $this->loadDirectory();
    }


    public function addKeyValue($key, $value)
    {

        $this->list[$key] = $value;
        return $value;

    }


    /*
    public function addValue($value)
    {

        if ($this->currentId ===null) {
            $this->currentId=$this->startId;
        }

        if (!in_array($value,$this->list)) {
            $this->list[$this->currentId] = $value;
        }

        $this->currentId++;

        /*
        $this->list[] = $value;
        $this->list = array_unique($this->list);
        $this->list = array_values($this->list);*/

    /*   return $this;

   }*/

    public function sortList()
    {

        //sort($this->list);
        asort($this->list);
        return $this;

    }


    public function getList()
    {
        return $this->list;
    }


    public function existsValue($value)
    {

        $returnValue = false;
        if (in_array($value, $this->list)) {
            $returnValue = true;
        }
        return $returnValue;

    }


    public function getId($value)
    {

        $id = array_search($value, $this->list);

        if ($id === false) {

            $this->onNotExists($value);
            $id = array_search($value, $this->list);
        }

        return $id;

    }

}