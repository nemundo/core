<?php

namespace Nemundo\Core\Type\Number;


use Nemundo\Core\Type\AbstractType;

class PercentNumber extends AbstractType
{

    /**
     * @var int
     */
    public $baseValue = 0;

    /**
     * @var int
     */
    public $roundDigit = 2;


    public function getValue()
    {

        $percent = '0 %';

        if ($this->baseValue <> 0) {
            $percent = round(($this->value / $this->baseValue) * 100, $this->roundDigit) . ' %';
        }

        return $percent;

    }

}