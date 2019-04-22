<?php

namespace Nemundo\Core\Http\Request\Post;


use Nemundo\Core\Http\Request\AbstractRequest;

class AbstractPostRequest extends AbstractRequest
{


    public function getValue()
    {

        /*
        $value = $this->value;
        if ($value === null) {
            $value = $this->defaultValue;
        }

        if ($this->value === null) {
            if ($this->existsParameter() ) {
                //if (isset($_REQUEST[$this->parameterName])) {
                $value = $this->valueParamter();  // $_REQUEST[$this->parameterName];
                $value = trim($value);
            }
        }*/


        $value = $_POST[$this->requestName];
        return $value;

    }



    public function existsParameter()
    {
        $value = isset($_GET[$this->parameterName]);
        return $value;
    }


    protected function valueParamter()
    {
        $value = $_GET[$this->parameterName];
        return $value;
    }

}