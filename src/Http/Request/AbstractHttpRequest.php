<?php

namespace Nemundo\Core\Http\Request;

use Nemundo\Core\Type\Number\YesNo;

abstract class AbstractHttpRequest extends AbstractRequest
{

    abstract protected function loadRequest();


    public function getValue()
    {

        $value = $this->defaultValue;
        if ($this->existsRequest()) {
            $value = trim($_REQUEST[$this->requestName]);
        }

        return $value;

    }


    public function getYesNoValue() {

        $value = (new YesNo())->fromText($this->getValue())->getValue();
        return $value;

    }


    public function existsRequest()
    {
        $value = isset($_REQUEST[$this->requestName]);
        return $value;
    }


    public function hasValue()
    {

        $returnValue = true;

        $value = '';

        if (isset($_REQUEST[$this->requestName])) {
            $value = $_REQUEST[$this->requestName];
        }

        if (($value == '') || ($value == '0')) {
            $returnValue = false;

            if ($this->defaultValue !== '' && $this->defaultValue !== null) {
                $returnValue = true;
            }

        }

        return $returnValue;

    }

}