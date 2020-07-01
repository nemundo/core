<?php

namespace Nemundo\Core\Http\Request;


use Nemundo\Core\Type\Number\YesNo;
use Nemundo\Model\Type\Number\YesNoType;

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
        //if (($value == '') || ($value == '0')) {
        if (($value == '') || ($value == '0') || ($value == null)) {
            $returnValue = false;
        }

        return $returnValue;

    }


    public function getYesNoValue() {


        $value = (new YesNo())->fromText($this->getValue())->getValue();  // YesNoType())->get
        return $value;

    }

}