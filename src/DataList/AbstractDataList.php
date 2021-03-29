<?php

namespace Nemundo\Core\DataList;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractDataList extends AbstractBase
{

    private $list = [];

    abstract protected function loadDataList();

    abstract protected function onNew($value);

    public function __construct()
    {
        $this->loadDataList();
    }


    protected function addIdValue($id, $value)
    {

        $this->list[$id] = $value;
        return $value;

    }


    public function getId($value)
    {

        $id = null;

        $value = trim($value);

        if ($value !== '') {

            $id = array_search($value, $this->list);

            if ($id === false) {
                $this->onNew($value);
                $id = array_search($value, $this->list);
            }

        }

        return $id;

    }

}