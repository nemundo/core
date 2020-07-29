<?php


namespace Nemundo\Core\Math\Statistic;


use Nemundo\Core\Base\AbstractBase;

// MinMaxNormalizedData

// AbstractNumberList
// Analog ChartData

class MinMaxNormalization extends AbstractBase
{

    private $valueList=[];

    public function addValue($value) {

        $this->valueList[]=$value;
        return $this;

    }


    public function getNormalizedData() {

        $min = min($this->valueList);
        $max=max($this->valueList);

        $valueListNew=[];
        foreach ($this->valueList as $value) {
            $valueListNew[] = ($value-$min)/($max-$min);
        }

        return $valueListNew;


    }


}