<?php

namespace Nemundo\Core\Directory;


use Nemundo\Core\Base\AbstractBase;

// UniquList
class UniqueDirectory extends AbstractBase
{

    private $list = [];

    public function addValue($value)
    {

        $this->list[] = $value;
        $this->list = array_unique($this->list);
        $this->list = array_values($this->list);

        return $this;

    }

    public function sortList() {

        sort($this->list);
        return $this;

    }


    public function getList()
    {
        return $this->list;
    }


}