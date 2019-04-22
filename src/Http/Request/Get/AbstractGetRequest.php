<?php

namespace Nemundo\Core\Http\Request\Get;


use Nemundo\Core\Http\Request\AbstractRequest;

class AbstractGetRequest extends AbstractRequest  // AbstractGetPostParameter
{



    public $defaultValue;


    public function getValue()
    {


        $value = $this->defaultValue;

        /*
        $value = $this->value;
        if ($value === null) {
            $value = $this->defaultValue;
        }

        /*
        if ($this->value === null) {
            if ($this->existsParameter() ) {
                //if (isset($_REQUEST[$this->parameterName])) {
                $value = $this->valueParamter();  // $_REQUEST[$this->parameterName];
                $value = trim($value);
            }
        }*/


        //$value = $this->defaultValue;
        if ($this->existsRequest() ) {
            //if (isset($_REQUEST[$this->parameterName])) {
            //$value = $this->valueParamter();  // $_REQUEST[$this->parameterName];
            //$value = trim($value);
            $value =trim( $_GET[$this->requestName]);

        }


        return $value;

    }



    public function existsRequest()
    {
        $value = isset($_GET[$this->requestName]);
        return $value;
    }


    /*
    protected function valueParamter()
    {
        $value = $_GET[$this->parameterName];
        return $value;
    }*/

}