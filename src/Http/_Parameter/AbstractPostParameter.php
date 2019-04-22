<?php

namespace Nemundo\Core\Http\Parameter;


use Nemundo\Core\Log\LogMessage;


abstract class AbstractPostParameter extends AbstractGetPostParameter
{


    public function existsParameter()
    {
      $value =   isset($_POST[$this->parameterName]);
      return $value;
    }


    protected function valueParamter()
    {
        $value =  $_POST[$this->parameterName];
        return $value;
    }

}