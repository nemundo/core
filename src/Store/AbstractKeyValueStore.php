<?php

namespace Nemundo\Core\Store;

use Nemundo\Bfs\Gemeinde\Data\Kanton\KantonReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Directory\AbstractKeyValueDirectory;
use Parlament\Data\Rat\RatReader;


// core/KeyValue

// IdDirectory
// AbstractKeyValueList
// AbstractKeyValueDirecotry
// AbstractKeyValueStore
// AbstractKeyValueList
abstract class AbstractKeyValueStore extends AbstractBase
{

    protected $defaultValue;

    private $list = [];


    abstract protected function loadList();

    public function __construct()
    {

        $this->loadList();

    }


    protected function addValue($key,$value) {

        $this->list[$key] = $value;

    }


    public function getId($key)
    {

        $id = $this->defaultValue;  // null;
        if (isset($this->list[$key])) {
            $id = $this->list[$key];
        } /*else {
            (new Debug())->write('No item found. Value: ' . $key);
        }*/



        return $id;

    }

}