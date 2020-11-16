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


    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }


    public function getAbsoluteNumber() {
        return abs($this->getValue());
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


    public function getFormatWithLeadingZero($length)
    {
        $format = str_pad($this->getValue(), $length, '0', STR_PAD_LEFT);
        return $format;
    }


    public function formatNumber($decimalNumber = 0)
    {

        $value = number_format($this->getValue(), $decimalNumber, '.', '\'');
        return $value;

    }


    public function getFormatNumberAfterDecimal($decimalNumber = 0)
    {

        $value = number_format($this->getValue(), $decimalNumber);
        return $value;

    }


    public function roundNumber($anzahlDezimalStellen = 2)
    {

        $value = round($this->value, $anzahlDezimalStellen);
        return $value;

    }


    public function isEven() {

            $value=false;
            if($this->value % 2 == 0){
                $value=true;
            }

            return $value;

    }


    public function isOdd() {

        return !$this->isEven();

    }

}
