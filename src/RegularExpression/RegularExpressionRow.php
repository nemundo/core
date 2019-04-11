<?php

namespace Nemundo\Core\RegularExpression;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;

class RegularExpressionRow extends AbstractBaseClass
{

    protected $data;

    public function __construct($data)
    {
        $data = array_change_key_case($data);
        $this->data = $data;
    }



    public function getValue($number)
    {

        $value = '';

        if (isset(array_values($this->data)[$number])) {
            $value = array_values($this->data)[$number];
        } else {
            (new LogMessage())->writeError('Row Field Number ' . $number . ' does not exist.');
        }

        $value = trim($value);

        return $value;

    }

}