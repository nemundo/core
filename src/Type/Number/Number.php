<?php

namespace Nemundo\Core\Type\Number;

use Nemundo\Core\Log\LogFile;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\AbstractType;

class Number extends AbstractType
{

    public function changeValue($value)
    {

        if (is_numeric($value)) {
            $this->value = $value;
        } else {
            //(new LogMessage())->writeError('Number is not valid');

            $message = 'Number is not valid. Value: ' . $value;
            (new LogMessage())->writeError($message);
            //throw new \Exception($message);

        }

    }


    public function getValue()
    {
        return $this->value;
    }


    public function plus($plusValue)
    {
        $this->value = $this->value + $plusValue;
        return $this;
    }

    public function minus($plusValue)
    {
        $this->value = $this->value + $plusValue;
        return $this;
    }


    function getFormatWithLeadingZero($length)
    {
        $format = str_pad($this->getValue(), $length, '0', STR_PAD_LEFT);
        return $format;
    }


    function formatNumber($decimalNumber = 0)
    {

        $value = number_format($this->getValue(), $decimalNumber, '.', '\'');
        return $value;

    }


    function roundNumber($anzahlDezimalStellen = 2)
    {

        $value = round($this->value, $anzahlDezimalStellen);
        return $value;

    }

}
