<?php

namespace Nemundo\Core\Http\Request\Post;


use Nemundo\Core\Http\Request\AbstractGetPostRequest;
use Nemundo\Core\Http\Request\AbstractRequest;

class AbstractPostRequest extends AbstractGetPostRequest
{

    public function getValue()
    {

        $value = $this->defaultValue;
        if ($this->existsRequest()) {
        $value = trim($_POST[$this->requestName]);
        }

        return $value;

    }

    public function hasValue()
    {

        $returnValue = true;

        $value = $this->getValue();
        if (($value == '') || ($value == '0')) {
            $returnValue = false;
        }

        return $returnValue;

    }


    public function existsRequest()
    {
        $value = isset($_POST[$this->requestName]);
        return $value;
    }

}