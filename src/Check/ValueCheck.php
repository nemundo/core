<?php

namespace Nemundo\Core\Check;


use Nemundo\Core\Base\AbstractBase;

class ValueCheck extends AbstractBase
{

    public function hasValue($value)
    {

        $returnValue = true;
        if ((is_null($value)) || (trim($value) == '')) {
            $returnValue = false;
        }

        return $returnValue;

    }

}