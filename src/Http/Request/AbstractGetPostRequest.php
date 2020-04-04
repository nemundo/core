<?php

namespace Nemundo\Core\Http\Request;


use Nemundo\Core\Http\Request\AbstractRequest;

abstract class AbstractGetPostRequest extends AbstractRequest
{

    /**
     * @var string
     */
    public $defaultValue = '';


    abstract public function getValue();

    public function hasValue()
    {

        $returnValue = true;

        $value = $this->getValue();
        if (($value == '') || ($value == '0')) {
            $returnValue = false;
        }

        return $returnValue;

    }


}