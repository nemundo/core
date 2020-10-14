<?php

namespace Nemundo\Core\Math\Statistic;

use Nemundo\Core\Base\AbstractBase;


class Normalizer extends AbstractBase
{

    private $valueList = [];

    public function addValue($value)
    {

        $this->valueList[] = $value;
        return $this;

    }


    public function getNormalizedData()
    {

        if (sizeof($this->valueList) > 0) {
            $min = min($this->valueList);
            $max = max($this->valueList);
        }

        $valueListNew = [];
        foreach ($this->valueList as $value) {

            $diff = $max - $min;

            if ($diff !==0) {
            $valueListNew[] = ($value - $min) / $diff;  // ($max - $min);
            } else {
                $valueListNew[] = $value - $min;
            }


        }

        return $valueListNew;

    }

}