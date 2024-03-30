<?php

namespace Nemundo\Core\Check;

use Nemundo\Core\Base\AbstractBase;

class Check extends AbstractBase
{

    public function hasValue($value) {

        $hasValue = false;
        if (($value !==null) && (trim($value) !=='')) {
            $hasValue = true;
        }

        return $hasValue;

    }

}