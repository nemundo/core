<?php

namespace Nemundo\Core\Http\Request\Post;


use Nemundo\Core\Http\Request\AbstractGetPostRequest;
use Nemundo\Core\Http\Request\AbstractRequest;

class AbstractPostRequest extends AbstractGetPostRequest
{

    /**
     * @var string
     */
    //public $defaultValue;

    public function getValue()
    {

        $value = $this->defaultValue;
        if ($this->existsRequest()) {
        $value = trim($_POST[$this->requestName]);
        }

        return $value;

    }



    public function existsRequest()
    {
        $value = isset($_POST[$this->requestName]);
        return $value;
    }


    /*
    protected function valueParamter()
    {
        $value = $_GET[$this->parameterName];
        return $value;
    }*/

}