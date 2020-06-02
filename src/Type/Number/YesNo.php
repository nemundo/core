<?php

namespace Nemundo\Core\Type\Number;


use Nemundo\Core\Type\AbstractType;

class YesNo extends AbstractType
{

    public function __construct($value= false)
    {
        parent::__construct($value);
    }

    public function getText()
    {

        $text = 'false';
        if ($this->value) {
            $text = 'true';
        }

        return $text;

    }


    public function invertValue()
    {
        $this->value = !$this->value;
        return $this;
    }


    public function fromText($text)
    {

        $text = strtolower($text);

        //$value = null;
        if ($text === 'false') {
            $this->value = false;
        }

        if ($text === 'true') {
            $this->value = true;
        }

        return $this;

    }

}