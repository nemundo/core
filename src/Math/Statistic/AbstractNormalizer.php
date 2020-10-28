<?php

namespace Nemundo\Core\Math\Statistic;

use Nemundo\Core\Base\AbstractBase;


abstract class AbstractNormalizer extends AbstractBase
{

    private $valueList = [];

    /**
     * @var bool
     */
    private $dataLoaded = false;

    abstract protected function loadNormalizer();

    protected function addValue($value)
    {

        $this->valueList[] = $value;
        return $this;

    }



    public function getData() {
        return $this->valueList;
    }


    public function getNormalizedData()
    {

        if (!$this->dataLoaded) {
            $this->loadNormalizer();
            $this->dataLoaded = true;
        }

        if (sizeof($this->valueList) > 0) {
            $min = min($this->valueList);
            $max = max($this->valueList);
        }

        $valueListNew = [];
        foreach ($this->valueList as $value) {

            $diff = $max - $min;

            if ($diff !== 0) {
                $valueListNew[] = ($value - $min) / $diff;
            } else {
                $valueListNew[] = $value - $min;
            }

        }

        return $valueListNew;

    }

}