<?php

namespace Nemundo\Core\Http\Parameter;


abstract class AbstractGetParameter extends AbstractGetPostParameter
{

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